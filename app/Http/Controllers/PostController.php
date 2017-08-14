<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;
use Purifier;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //variable to store all the blog post
        $posts=Post::where('admin_id',\Auth::user()->id)->orderBy('id','desc')->paginate(10);
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
        $categories=Category::all();
        return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $author_id)
    {
        if ($request->input('published')!=1)
        {
            $request->published=0;    
        }
        //validate the data

        $this->validate($request,array(
                'title'=>'required|max:255',
                'slug' =>'required|alpha_dash|min:3|max:255|unique:posts,slug',
                'category_id'=>'required|integer',
                'body' =>'required'
            ));

        //store the data

        $post=new Post;     //Post wont work until or unless we use namespace
        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->category_id = $request->category_id;
        $post->published = $request->published;
        $post->body  = Purifier::clean($request->body);
        $post->admin_id = $author_id; 
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
        $categories=Category::all();
        $cats=array() ;
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        //redirect to the page
        return view('posts.edit')->withPost($post)->withCategories($cats); 

    }

    /* Update through posts.show i.e. for changing the value of published */
    public function update_published($id)
    {
        $post=Post::find($id);
        if ($post->published==1)
        {
            $post->published=0;
            $post->save();
        }
        else
        {
            $post->published=1;
            $post->save();
        }

        return redirect()->route('posts.index');
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
        $author_id=$post->admin_id;
        if ($request->input('slug') == $post->slug) {
            $this->validate($request,array(
                'title'=>'required|max:255',
                'category_id'=>'required|integer',
                'body' =>'required'
            ));
        }
        else{
            $this->validate($request,array(
                'title'=>'required|max:255',
                'slug' =>'required|alpha_dash|min:3|max:255|unique:posts,slug',
                'category_id'=>'required|integer',
                'body' =>'required'
            ));
        }

        if($post->published==1)
        {

            // save the data to db
            $post->title = $request->input('title');
            $post->slug  = $request->input('slug');
            $post->category_id=$request->input('category_id');
            $post->body  = Purifier::clean($request->input('body'));
            $post->admin_id = $author_id;
            $post->save();
        }

        else
        {
            if ($request->input('published')!=1)
            {
                $request->published=0;    
            }
            
            $post->title = $request->input('title');
            $post->slug  = $request->input('slug');
            $post->category_id=$request->input('category_id');
            $post->published = $request->published;
            $post->body  = $request->input('body');
            $post->admin_id = $author_id;
            $post->save();   
        }

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
