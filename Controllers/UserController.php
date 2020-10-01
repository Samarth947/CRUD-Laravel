<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function create()
    {
        return view('usercreate');
    }
    public function store(Request $request)
    {
        $user=new User();
        $user->name=$request->get('Username');
        $user->email=$request->get('Email');
        $user->save();
        return redirect('user')->with('success','User has been successfully added');
    }
    public function index()
    {
        $Users= User::all();
        return view('userindex',compact('Users'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('useredit',compact('user','id'));
    }
    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $user->name=$request->get('Username');
        $user->email=$request->get('Email');
        $user->save();
        return redirect('user')->with('success','User has been successfully updated');
    }
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect('user')->with('success','User has been successfully deleted');
    }
}
