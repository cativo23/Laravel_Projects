<?php

namespace App\Http\Controllers\Api;

use App\Account;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Validator;

class AuthController extends Controller
{
    /**
     * Login user and create token
     *
     * @param Request $request
     * @return JsonResponse access_token
     */
    public function login(Request $request){

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if( auth()->attempt($credentials) ){
            $user = Auth::user();
            $tokenResult =  $user->createToken('Personal Access Token');
            return response()->json([
                'token_type' => 'Bearer',
                'access_token' => $tokenResult->accessToken,
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
                'user_id'=>$user->id,
            ], 200);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return JsonResponse [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([ 'error'=> $validator->errors() ]);
        }
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $account = new Account(['user_id'=>$user->id]);
        $account->save();
        $tokenResult =  $user->createToken('Personal Access Token');
        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ], 200);

    }

    public function user_detail()
    {
        $user = Auth::user()->with('account')->get();
        return response()->json(['success' => $user], 200);
    }
}
