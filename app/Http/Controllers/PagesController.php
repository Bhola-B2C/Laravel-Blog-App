<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

class PagesController extends Controller
{
	public function getHome()
	{
		$posts=Post::where('published',1)->orderBy('created_at','desc')->limit(5)->get();
		$catcnt=[];
		$posts_to_cnt=Post::where('published',1)->get();
		foreach ($posts_to_cnt as $post) 
		{
			$catcnt[$post->category_id]=Post::where('category_id',$post->category_id)->count();	
		}
		$categories=Category::all();
		return view('pages.home')->withPosts($posts)->withCategories($categories)->withCatcnt($catcnt);
	}

	public function getAbout()
	{
		return view('pages.about');
	}

	public function getContact()
	{
		return view('pages.contact');
	}
}