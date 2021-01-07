<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function verify($token){
        $user = User::where('verification_token' , $token)->first();
        if($user){
        $user->verified = User::VERIFIED_USER;
        $user->verification_token = null ;
        $user->save();
        return redirect('/login')->with('message' , 'user has been verified please try to login in ');
        }

        return redirect('/login')->with('message' , 'user is already verified');

    }
}
