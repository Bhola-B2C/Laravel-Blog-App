<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Hash;

class SocialAuthController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('');
    }*/

 	public function socialredirect($provider)
 	{
        echo $provider;
        try
        {
 		     return Socialite::driver($provider)->redirect();
        }
        catch(Exception $e)
        {
            echo $e;
        }
 	}   

 	public function socialcallback(Request $requests, $provider)
 	{
        try
        {
           $user = Socialite::driver($provider)->stateless()->user();
           $email = $user->getEmail();

           if($email==NULL)
           {
                $email=str_replace(' ', '', $user->getName()) . "@facebook.com";
           }

           $profile = User::where('email',$email)->first();
           $password='';

           if(empty($profile))
           {
            $profile = new User;
            $profile->name  	= $user->getName();
            $profile->email     = $email;
            $password           = str_random(8);
            $profile->password  = Hash::make($password);
            $profile->provider  = $provider;
            $profile->provider_id = $user->id;
            //$profile->verified=1;
            $profile->remember_token='NULL';
            $profile->save();
            }

            /*for other features of home to take palce */

            /*$posts=Post::where('published',1)->orderBy('created_at','desc')->limit(5)->get();
            $catcnt=[];
            $posts_to_cnt=Post::where('published',1)->get();
            foreach ($posts_to_cnt as $post) 
            {
                $catcnt[$post->category_id]=Post::where('category_id',$post->category_id)->count(); 
            }
            $categories=Category::all();

            return view('pages.home')->withProfile($profile)->withPosts($posts)->withCategories($categories)->withCatcnt($catcnt);*/
            return redirect()->route('pages.home');
        }
        catch(Exception $e)
        {
            echo $e;
        }
 	}
}
