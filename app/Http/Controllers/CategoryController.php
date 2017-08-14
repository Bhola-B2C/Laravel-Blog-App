<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display a view of all categories
        //also contain a form to create

        $categories=Category::all();
        return view('categories.index')->withCategories($categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name'=>'required|max:255'
            ]);

        $category=new Category;
        $category->name=$request->input('name');
        $category->save();

        Session::flash('success','Category was successfully created !!!');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat=Category::find($id);
        $posts=Post::where('published',1)->orderBy('created_at','desc')->limit(5)->get();
        $catcnt=[];
        $posts_to_cnt=Post::where('published',1)->get();
        foreach ($posts_to_cnt as $post) 
        {
            $catcnt[$post->category_id]=Post::where('category_id',$post->category_id)->count(); 
        }
        $categories=Category::all();
        $posts2=Post::where('category_id',$id)->orderBy('id','desc')->paginate(10);
        return view('categories.show')->withPosts($posts)->withCategories($categories)->withCatcnt($catcnt)->withPosts2($posts2)->withCategoryname($cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $found=Post::where('category_id',$id)->count();
        if($found > 0)
        {
            Session::flash('danger','The Category has post associated with it !! Cant delete the category');    
        }
        else
        {
            $category=Category::find($id);
            $category->delete();
            Session::flash('success','The Category was successfully deleted');
        }
        return redirect()->route('categories.index');
    }
}
