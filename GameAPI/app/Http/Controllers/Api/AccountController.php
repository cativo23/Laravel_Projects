<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function setScore(Request $request, User $user){

        $request->validate([
            'score'=>'integer',
        ]);

        $account = $user->account;
        $account->score = $request->input('score');
        $account->save();


        return response()->json([
            'message'=>"successfully changed score!"
        ]);
    }

    public function setLevel(Request $request, User $user){
        $request->validate([
            'level'=>'integer',
        ]);

        $account = $user->account;
        $account->level = $request->input('level');
        $account->save();

        return response()->json([
            'message'=>"successfully changed level!"
        ]);
    }


    public function setAnswers(Request $request, User $user){
        $request->validate([
            'answers'=>'integer',
        ]);

        $account = $user->account;
        $account->correct_answers = $request->input('answers');
        $account->save();


        return response()->json([
            'message'=>"successfully changed Answers!"
        ]);
    }
}
