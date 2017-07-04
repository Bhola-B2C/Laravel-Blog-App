<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
	public function getIndex(){

		$posts=Post::where('published','=',1)->orderBy('id','desc')->paginate(10);

		$catcnt=[];
		$posts_to_cnt=Post::where('published',1)->get();
		foreach ($posts_to_cnt as $post) 
		{
			$catcnt[$post->category_id]=Post::where('category_id',$post->category_id)->count();	
		}
		$categories=Category::all();

		return view('blog.index')->withPosts($posts)->withCategories($categories)->withCatcnt($catcnt);
	}

    public function getSingle($slug){

    	$post=Post::where('slug','=',$slug)->first();

    	$posts=Post::where('published','=',1)->orderBy('id','desc')->limit(5)->get();

		$catcnt=[];
		$posts_to_cnt=Post::where('published',1)->get();
		foreach ($posts_to_cnt as $post1) 
		{
			$catcnt[$post1->category_id]=Post::where('category_id',$post1->category_id)->count();	
		}
		$categories=Category::all();

    	return view('blog.single')->withPost($post)->withPosts($posts)->withCategories($categories)->withCatcnt($catcnt);
    }
}
