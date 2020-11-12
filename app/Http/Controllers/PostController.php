<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use Auth;
use App\Image;
use File;

class PostController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderby('id', 'DESC')->get();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
      
        return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'title'=>'required|string|max:200|',
            'description'=>'required|string',
            'category_name'=>'required'
           
           
        ]);
        $title=$request->title;
        $description=$request->description;
        $category_name=$request->category_name;

        $posts= new Post;
        $posts->title=$title;
        $posts->description=$description;
        $posts->user_id=Auth::user()->id;
        $posts->category_id=$category_name;

       $posts->save();


        $lastid=$posts->id;
        if ($request->hasFile('image')) {
            $files=$request->file('image');
            foreach ($files as $file) {
            $name=time().'_'.$file->getClientOriginalName();
            $path=public_path('/storage/uploads/');
            $file->move($path,$name);

            $images=new Image;
            $images->image=$name;
            $images->post_id=$lastid;
            $images->save();
           
            }
        }
         return redirect('post_index');
         
     


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$categories=Category::all();
        $posts=Post::findOrFail($id);
       return view('post.show',compact('posts','categories'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $posts=Post::findOrFail($id);
        return view('post.edit',compact('posts','categories'));
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
        $request->validate([
            'title'=>'required|string|max:200|',
            'description'=>'required|string',
            'category_name'=>'required'
        ]);
        
        $title=$request->title;
        $description=$request->description;
        $category_name=$request->category_name;

        $posts=Post::findOrFail($id);

        $posts->title=$title;
        $posts->description=$description;
        $posts->user_id=Auth::user()->id;
        $posts->category_id=$category_name;
        $posts->save();

          if ($request->hasFile('image')) {
            
            $files=$request->file('image');
            foreach($files as $file) {

            $name=time().'_'.$file->getClientOriginalName();
            $path=public_path('/storage/uploads/');
            $file->move($path,$name);

            $images=new Image;
            $images->image=$name;
            $images->post_id=$id;
            $images->save();
           
            }
        }

        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images=Image::where('post_id',$id)->get();
        if(Post::where('id',$id)->delete()){
        foreach ($images as $image) {
            $path=public_path('/storage/uploads/');
            $name=$image->image;
            File::delete($path.''.$name);


        }

    
         


       return redirect()->back()->with('success','Record deleted successfully!');
    }else{
        return redirect()->back();
       }
    
    
    }
}

