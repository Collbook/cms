<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
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
            'name'  => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'photo_id' => 'required|image',
            'role'   => 'required',
            'status' => 'required',
            'password'  => 'required|confirmed|min:3'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role');
        $user->is_active = $request->input('status');
        $user->password = bcrypt($request->input('password'));
        
        if($file = $request->file('photo_id'))
        {
            $imageName = time().$file->getClientOriginalName();
            $file->move('images',$imageName);

            $photo = new Photo;
            $photo->file = $imageName;
            $photo->save();


            //dd($photo->id);

            $user->photo_id = $photo->id;
        }

        
        $user->save();
        
        return redirect()->back()->with('status','Created user successfully');

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
        //
    }
}
