<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        $allcount=count( $posts);
        $p_count=count(Post::where('status',1)->get());
        $up_count=count(Post::where('status',0)->get());
        return view('backend.posts.index',compact('posts','allcount','p_count','up_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('backend.posts.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating form data
        $request->validate([
            'title'=>'required|max:255',
            'category_id'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png',
            'body'=>'required'
        ]);

        // making slug
        $explode=explode(' ',$request->title);
        $implode=implode('-',$explode);
        $slug=$implode.uniqid();
 
        // image capture and it's name
        $img=$request->file('image');
        $imageName=uniqid().$img->getClientOriginalName();
        
        //uploading image
        if(!Storage::disk('public')->exists('posts')){
            Storage::disk('public')->makeDirectory('posts');
        }
        $request->image->storeAs('public/posts/',$imageName);

        //saving data to database
        $posts=new Post();
        $posts->title=$request->title;
        $posts->category_id=$request->category_id;
        $posts->user_id=session('id');
        $posts->slug=$slug;
        $posts->image=$imageName;
        $posts->body=$request->body;
        if(isset($request->status)){
            $posts->status=1;
        }else{
            $posts->status=0;
        }
        $posts->created_at=Carbon::now();
        $posts->save();

        session()->flash('msg','Your post has been saved successfully');
        return redirect('post');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::where('id',$id)->get();
        return view('backend.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::where('id',$id)->get();
        $category=Category::all();
        return view('backend.posts.edit',compact('post','category'));
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
            'title'=>'required|max:255',
            'category_id'=>'required',
            'image'=>'sometimes|image|mimes:jpg,jpeg,png',
            'body'=>'required'
        ]);
    
        $post=Post::findOrFail($id);
         if($post->title!=$request->title){
             // making slug
            $explode=explode(' ',$request->title);
            $implode=implode('-',$explode);
            $slug=$implode.uniqid();
         }else{
            $slug=$post->slug;
         }

         if(!empty($request->image)){
            $img=$request->file('image');
            $imageName=uniqid().$img->getClientOriginalName();
             //deleting old image
            if(Storage::disk('public')->exists('posts/'.$post->image)){
                Storage::disk('public')->delete('posts/'.$post->image);
            }
             //storing new image
            $request->image->storeAs('public/posts',$imageName);
         }else{
             $imageName=$post->image;
         }

         //updating database
         $post->title=$request->title;
         $post->slug=$slug;
         $post->category_id=$request->category_id;
         $post->image=$imageName;
         if(isset($request->status)){
            $post->status=1;
        }else{
            $post->status=0;
        }
        $post->body=$request->body;
        $post->updated_at=Carbon::now();
        $post->save();

        //redirecting
        session()->flash('msg','Your post has been updated successfully');
        return redirect('/post');
         


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // deleting post
        $post=Post::findOrFail($id);
        if(Storage::disk('public')->exists('posts/'.$post->image)){
            // 
            Storage::disk('public')->delete('posts/'.$post->image);
        }
        
        $post->delete();

        session()->flash('msg','Your requested post has been deleted');
        return redirect('post');

    }
}
