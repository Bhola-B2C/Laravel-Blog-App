<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
	public function getIndex(){
		$posts=Post::orderBy('id','desc')->paginate(10);
		return view('blog.index')->withPosts($posts);
	}

    public function getSingle($slug){
    	$post=Post::where('slug','=',$slug)->first();
    	return view('blog.single')->withPost($post);
    }
}
