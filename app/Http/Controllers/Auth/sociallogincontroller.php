<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\socialprovider;
use App\User;
use Socialite; 

class sociallogincontroller extends Controller
{ 
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
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

        // $user->token;
        /*
         * $user->getId();
            $user->getNickname();
            $user->getName();
            $user->getEmail();
            $user->getAvatar();
         */

        $selectProvider = socialprovider::where('provider_id' ,  $user->getId())->first();

        if(!$selectProvider){
            //new user

            $userGetReal = User::where('email' , $user->getEmail())->first();

            if(!$userGetReal){
                $userGetReal = new User();
                $userGetReal->name =  $user->getName();
                $userGetReal->email = $user->getEmail();
                $userGetReal->save();
            }

            $newprovider = new socialprovider();
            $newprovider->provider_id = $user->getId();
            $newprovider->provider = $provider;
            $newprovider->user_id = $userGetReal->id;
            $newprovider->save();

        }else{
            //login user
            $userGetReal  = User::find($selectProvider->user_id);
        }

        auth()->login($userGetReal);
        return Redirect('/');
    } 
}
