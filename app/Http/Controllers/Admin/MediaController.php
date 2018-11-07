<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Photo::all();
        return view('admin.media.index',compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $media = new Photo;
            $media->file = $name;
            $media->save();
        
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
        $media = Photo::find($id);
        $media->delete();

        if(file_exists(public_path().$media->file))
        {
            unlink(public_path().$media->file);
        }
        
        $media->delete();
        return redirect()->back()->with('status','Deleted media successfully !');
    }

    public function deleteMedia(Request $request)
    {
        $medias =  $request->checkBoxArray;
        foreach ($medias as $media) {
            $photo = Photo::find($media);
            $photo->delete();
        }
        return redirect()->back()->with('status','Deleted media successfully !');
    }
}
