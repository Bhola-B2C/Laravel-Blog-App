<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //variable to store all the blog post
        $posts=Post::orderBy('id','desc')->paginate(10);
        //return to view with passing variable 
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data

        $this->validate($request,array(
                'title'=>'required|max:255',
                'slug' =>'required|alpha_dash|min:3|max:255|unique:posts,slug',
                'body' =>'required'
            ));

        //store the data

        $post=new Post;     //Post wont work until or unless we use namespace
        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->body  = $request->body;
        $post->save();

        Session::flash('success','The blog post was successfully saved !');

        //redirect to another page

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //store the post obtained from db in a var
        $post=Post::find($id);
        //redirect to the page
        return view('posts.edit')->withPost($post); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the data
        $post=Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request,array(
                'title'=>'required|max:255',
                'body' =>'required'
            ));
        }
        else{
            $this->validate($request,array(
                'title'=>'required|max:255',
                'slug' =>'required|alpha_dash|min:3|max:255|unique:posts,slug',
                'body' =>'required'
            ));
        }

        // save the data to db
        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->body  = $request->input('body');
        $post->save();

        //store the message in flash
        Session::flash('success','The post was successfully updated !');

        //redirect to the view Page
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        Session::flash('success','The blog post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
