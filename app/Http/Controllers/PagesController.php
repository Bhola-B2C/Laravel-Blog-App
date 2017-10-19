<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function getHome(Request $request)
	{
		$posts = Post::where('published','=',1)->orderBy('id','desc');
		
		if( isset($request->q))
		{
			$posts->where(function ($query) use ($request) {
                $query->where('title', 'LIKE', '%'.$request->q.'%')
                      ->orWhere('body', 'LIKE', '%'.$request->q.'%')
                      ->orWhere('slug', 'LIKE', '%'.$request->q.'%');
            });
		}
		$posts = $posts->limit(5)->get();

		//$posts=Post::where('published',1)->orderBy('created_at','desc')->limit(5)->get();
		
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
		$posts=Post::where('published',1)->orderBy('created_at','desc')->limit(5)->get();
		$catcnt=[];
		$posts_to_cnt=Post::where('published',1)->get();
		foreach ($posts_to_cnt as $post) 
		{
			$catcnt[$post->category_id]=Post::where('category_id',$post->category_id)->count();	
		}
		$categories=Category::all();
		return view('pages.about')->withPosts($posts)->withCategories($categories)->withCatcnt($catcnt);
	}

	public function getContact()
	{
		$posts=Post::where('published',1)->orderBy('created_at','desc')->limit(5)->get();
		$catcnt=[];
		$posts_to_cnt=Post::where('published',1)->get();
		foreach ($posts_to_cnt as $post) 
		{
			$catcnt[$post->category_id]=Post::where('category_id',$post->category_id)->count();	
		}
		$categories=Category::all();
		return view('pages.contact')->withPosts($posts)->withCategories($categories)->withCatcnt($catcnt);
	}
}