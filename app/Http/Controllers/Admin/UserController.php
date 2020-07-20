<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function all_user(){

    	$users = User::where('userType','Admin')->where('id','!=',Auth::id())->orderBy('id','DESC')->get();
    	return view('pages.user.list',compact('users'));

    }

    public function create(){
    	return view('pages.user.create');
    }

    public function store(Request $request){
    	$request->validate([
    		'email' => 'unique:users'
    	]);
        $code = rand(0000,9999);
    	$user = new User();
    	$user->name = $request->name;
    	$user->userType = 'Admin';
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->password = bcrypt($code);
        $user->code = $code;
    	$user->save();
    	return redirect()->route('user.view')->with('success','User Added Successfully');
 


    }

    public function delete($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect()->back()->with('success','User Deleted Successfully');
    }
}
