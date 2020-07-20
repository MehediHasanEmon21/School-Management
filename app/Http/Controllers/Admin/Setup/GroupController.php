<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Model\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
     public function index(){

    	$groups = Group::orderBy('id','DESC')->get();
    	return view('pages.setup.group.list',compact('groups'));

    }

    public function create(){
    	
    	return view('pages.setup.group.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:groups'
        ]);
    	$group = new Group();
    	$group->name = $request->name;
    	$group->save();
    	return redirect()->route('student.group.view')->with('success','Group Added Successfully');
 


    }

      public function edit($id){

        $group = Group::find($id);
        return view('pages.setup.group.edit',compact('group'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:groups'
        ]);

        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
        return redirect()->route('student.group.view')->with('success','Group Updated Successfully');

    }

    public function delete($id){
        $group = Group::find($id);
        $group->delete();
        return redirect()->back()->with('success','Group Deleted Successfully');
    }
}
