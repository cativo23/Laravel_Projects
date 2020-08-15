<?php

namespace App\Http\Controllers\Admin\Super;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('admin', '=', 0)->get();

        return view('admin.super.users', compact('users'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('admin.users.index')->withMessage('User approved successfully!');
    }

    public function disapprove($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => null]);

        return redirect()->route('admin.users.index')->withMessage('User disapproved successfully!');
    }
}
