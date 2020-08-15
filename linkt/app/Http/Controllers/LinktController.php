<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LinktController extends Controller
{
    public function show_linkt(Request $request, $username){

        $user = User::where('username', '=', $username)->first();

        $links  = $user->links;
        return view('linkt.show', compact('user', 'links'));
    }
}
