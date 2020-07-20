<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Model\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){

    	$subjects = Subject::get();
    	return view('pages.setup.subject.list',compact('subjects'));

    }

    public function create(){
    	
    	return view('pages.setup.subject.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:subjects'
        ]);
    	$subject = new Subject();
    	$subject->name = $request->name;
    	$subject->save();
    	return redirect()->route('subject.view')->with('success','Subject Added Successfully');
 


    }

      public function edit($id){

        $subject = Subject::find($id);
        return view('pages.setup.subject.edit',compact('subject'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:subjects'
        ]);

        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->save();
        return redirect()->route('subject.view')->with('success','Subject Updated Successfully');

    }

    public function delete($id){
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->back()->with('success','Subject Deleted Successfully');
    }
}
