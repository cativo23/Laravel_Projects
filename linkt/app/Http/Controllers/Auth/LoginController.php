<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\SocialAccount;
use App\User;
use Exception;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Login username to be used by the controller.
     *
     * @var string
     */
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$fieldType => $login]);


        return $fieldType;
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param string $provider
     * @return RedirectResponse|void
     */
    public function redirectToProvider(string $provider)
    {
        try {
            $scopes = config("services.$provider.scopes") ?? [];
            if (count($scopes) === 0) {
                return Socialite::driver($provider)->redirect();
            } else {
                return Socialite::driver($provider)->scopes($scopes)->redirect();
            }
        } catch (Exception $e) {
            return abort(404);
        }
    }

    public function handleProviderCallback(string $provider)
    {
        try {
            $data = Socialite::driver($provider)->user();
            return $this->handleSocialUser($provider, $data);
        } catch (Exception $e) {
            return redirect('login')->withErrors(['authentication_deny' => 'Login with '.ucfirst($provider).' failed. Please try again.']);
        }
    }
    public function handleSocialUser(string $provider, object $data)
    {
        $user = User::where([
            "social->{$provider}->id" => $data->id,
        ])->first();
        if (!$user) {
            $user = User::where([
                'email' => $data->email,
            ])->first();
        }
        if (!$user) {
            return $this->createUserWithSocialData($provider, $data);
        }
        $social = $user->social;
        $social[$provider] = [
            'id' => $data->id,
            'token' => $data->token
        ];
        $user->social = $social;
        $user->save();
        $this->addSocialAccount($provider, $user, $data);
        return $this->socialLogin($user);
    }
    public function createUserWithSocialData(string $provider, object $data)
    {
        try {
            $user = new User;
            $user->name = $data->name;
            $user->email = $data->email;
            $user->social = [
                $provider => [
                    'id' => $data->id,
                    'token' => $data->token,
                ],
            ];
            // Check support verify or not
            if ($user instanceof MustVerifyEmail) {
                $user->markEmailAsVerified();
            }
            $user->save();
            $this->addSocialAccount($provider, $user, $data);
            return $this->socialLogin($user);
        } catch (Exception $e) {
            return redirect('login')->withErrors(['authentication_deny' => 'Login with '.ucfirst($provider).' failed. Please try again.']);
        }
    }
    public function socialLogin(User $user)
    {
        auth()->loginUsingId($user->id);
        return redirect($this->redirectTo);
    }

    private function addSocialAccount($provider, $user, $socialiteUser)
    {
        SocialAccount::create([
            'user_id' => $user->id,
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
            'token' => $socialiteUser->token,
        ]);
    }
}
