<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostCreateRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->input('category_id');
        $post->title = $request->input('title');
        $post->body  = $request->input('body');

        if($file = $request->file('photo_id'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);

            $photo = new Photo;
            $photo->file = $name;
            $photo->save();

            $post->photo_id = $photo->id;

        }

        $post->save();
        return redirect()->back()->with('status','Created post successfully');
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit',compact('categories','post'));
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
        //return $id;
        $post = Post::find($id);
        $post->user_id = $post->user->id;

        $post->category_id = $request->input('category_id');
        $post->title = $request->input('title');
        $post->body  = $request->input('body');

        if($file = $request->file('photo_id'))
        {
            $name = time().$file->getClientOriginalName();

            // delete image old
            if(file_exists(public_path().$post->photo->file))
            {
                unlink(public_path().$post->photo->file);
            }
            //$user->delete();

            $file->move('images',$name);

            //$photo = new Photo;
            $photo = Photo::find($post->photo->id);
            $photo->file = $name;
            $photo->save();

            $post->photo_id = $photo->id;

        }

        $post->save();
        return redirect()->back()->with('status','Updated post successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(file_exists(public_path().$post->photo->file))
        {
            unlink(public_path().$post->photo->file);
        }
        
        $post->delete();
        return redirect()->back()->with('status','Deleted post successfully !');
    }
}
