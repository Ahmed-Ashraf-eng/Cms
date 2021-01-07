<?php

namespace App\Http\Controllers;

use App\Provider;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class AuthSocController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        //Check if the user is already registed
        $selectProvider = Provider::where('provider_id' , $user->getId())->first();



        if(!$selectProvider){
        //new user
        $userGetReal = User::where('email' , $user->getEmail())->first();

        if(!$userGetReal){
            $userGetReal = New User();
            $userGetReal->name = $user->getName();
            $userGetReal->email = $user->getEmail();
            $userGetReal->verified = '1';
            $userGetReal->verification_token = 'Social media accounts verified' ;
            $userGetReal->save();
        }

        $newProvider = new Provider();
        $newProvider->provider_id = $user->getId();
        $newProvider->provider = $provider;
        $newProvider->user_id = $userGetReal->id ;

        $newProvider->save();

        }else{

            $userGetReal = User::where('id' , $selectProvider->user_id)
                                ->where('is_active' , 1)
                                ->first();
        }

        if($userGetReal){

        auth()->login($userGetReal);
        return redirect('/admin/user');
        }else{
            return view('banned');
        }
    }
}
