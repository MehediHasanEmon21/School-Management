<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function view(){

    	$user = User::find(Auth::id());
    	return view('pages.profile.show',compact('user'));

    }

    public function edit($id){

    	$user = User::find($id);
    	return view('pages.profile.edit',compact('user'));

    }

    public function update($id, Request $request){

    	$user =  User::find($id);
    	$image = $request->file('image');

    	if ($image) {
    		
    		$user_info = DB::table('users')->where('id',$id)->first();
    		$old_pic = $user_info->image;
    		if (file_exists($old_pic)) {
    			unlink($old_pic);
    		}
    		$unique_str = Str::random(10);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_name = $unique_str.'.'.$ext;
            $upload_path = 'public/assets/backend/images/profile/';
            $image_url = $upload_path.$image_name;
            $image->move($upload_path,$image_name);
    		$user->image = $image_url;

    	}else{
    		$user->image = $request->old_image;
    	}

    	
    	$user->name = $request->name;
    	$user->email  = $request->email ;
    	$user->mobile = $request->mobile;
    	$user->gender = $request->gender;
    	$user->userType = $request->role;

    	$user->save();

    	return redirect()->route('profile.view')->with('success','Profile Updated Successfully');

    }
}
