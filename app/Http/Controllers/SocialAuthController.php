<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;

class SocialAuthController extends Controller
{
 	public function socialredirect($id)
 	{
 		return Socialite::driver($id)->redirect();
 	}   

 	public function socialcallback(Request $requests, $id)
 	{
        try
        {
           $user = Socialite::driver($id)->user();
           $email = $user->getEmail();

           $profile = User::where('email',$email)->first();
           $password='';

           if(empty($profile))
           {
            $profile = new User;
            $profile->name  	= $user->getName();
            $profile->email     = $user->getEmail();
            $password           = str_random(8);
            $profile->password  = Hash::make($password);
            //$profile->verified=1;
            $profile->remember_token='NULL';
            $profile->save();
            }
            return view('/')->withProfile($profile);
        }
        catch(Exception $e)
        {
            echo $e;
        }
 	}
}
