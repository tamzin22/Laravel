<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Post;
use Session;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //variable containing all blog posts from db
        $posts = Post::orderBy('id','desc')->paginate(5);
        //return a view and pass in the variable
        return view('Posts.index')->withPosts($posts);
    }

  public function posts(){

    return Post::all();
  }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $categories = Category::all();
        $tags = Tag::all();
        return view('Posts.create') -> withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validate the data...

        $this -> validate($request , array(
            'title'        =>  'required|max:255',
            'category_id'  =>  'required |integer',
            'body'         =>  'required',
            'slug'         =>  'required|alpha_dash|min:5|max:255|unique:posts,slug'
             ));

        //store in the db...
        $post = new Post;
        $post -> title       = $request -> title;
        $post -> category_id = $request -> category_id;
        $post -> body        = $request -> body;
        $post -> slug        = $request -> slug;

        $post -> save();

        //synch('array of data we want to pass',false,)

        $post -> tags() -> sync($request -> tags,false);

        Session::flash('Success','Your post was sucessfully saved!');
        //redirect to another page

        return redirect()->route('posts.show' , $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('Posts.show')->withPost($post);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as a variable
        $post       = Post::find($id);
        $categories = Category::all();
        $cats       =  array( );
        foreach ($categories as $category) {
            $cats[$category ->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 =array();

        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag ->name;
        }
        //return the view and pass in the variable previously created
        return view('Posts.edit')->withPost($post) -> withCategories($cats)-> withTags($tags2);
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
        //validate data
           $post = Post::find($id);
           if ($request->input('slug')==$post->slug) {
               $this -> validate($request , array(
                 'title' => 'required|max:255',
                 'category_id' =>'required|integer',
                 'body'=>'required',
                 
                  ));
               }
            else{
          $this -> validate($request , array(
            'title'       => 'required|max:255',
            'category_id' =>'required|integer',
            'body'        =>'required',
            'slug '       =>'required||alpha_dash|min:5|max:255|unique:posts,slug'
             ));
                 }
        //Save the data to the db
         $post = Post::find($id);

         $post->  title        = $request->input('title');
         $post->  body         = $request->input('body');
         $post -> category_id  = $request->input('category_id');
         $post->  slug         = $request->input('slug');

         $post->save();

        //set flash data with success message

         Session::flash('Success' , 'This post was succesfully saved');

        //redirect with flash data to the posts.show

        return redirect()->route('posts.show' , $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        $post -> delete();

        Session::flash('Success' , 'This post was succesfully deleted');


        return redirect()->route('posts.index' , $post->id);

    }
}





