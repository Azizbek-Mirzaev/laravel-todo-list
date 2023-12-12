<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
         $users = User::get();

         return view('admin.user.index',[
            'user_list'=>$users
        ]);

    }

    public function edit($id)
    {
         $user = User::find($id);
         if(! $user){
            abort(404);
        }
         return view('admin.user.edit',[
            'user'=>$user]);

    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if(! is_null($request->password)){
        $user->password = $request->password;
        }
        //dd($user);
        $user->save();
        return redirect()->back();
    }
    public function delete($id)
    {
         $user = User::find($id);

         $user->delete();

         return redirect()->back();

    }
    public function show($id)
    {
         $user = User::find($id);

         if(is_null($user)){
            abort(404);
        }
        return view('admin.user.show',[
            'user'=>$user]);

    }

}

