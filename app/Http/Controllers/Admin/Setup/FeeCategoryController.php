<?php

namespace App\Http\Controllers\Admin\Setup;

use App\FeeCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function index(){

    	$fee_categories = FeeCategory::orderBy('id','DESC')->get();
    	return view('pages.setup.fee-category.list',compact('fee_categories'));

    }

    public function create(){
    	
    	return view('pages.setup.fee-category.create');
    }

    public function store(Request $request){
    
    	$this->validate($request,[
            'name' => 'required|unique:fee_categories'
        ]);
    	$fee_category = new FeeCategory();
    	$fee_category->name = $request->name;
    	$fee_category->save();
    	return redirect()->route('student.fee.category.view')->with('success','Fee Category Added Successfully');
 


    }

      public function edit($id){

        $fee_category = FeeCategory::find($id);
        return view('pages.setup.fee-category.edit',compact('fee_category'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:fee_categories'
        ]);

        $fee_category = FeeCategory::find($id);
        $fee_category->name = $request->name;
        $fee_category->save();
        return redirect()->route('student.fee.category.view')->with('success','Fee Category Updated Successfully');

    }

    public function delete($id){
        $fee_category = FeeCategory::find($id);
        $fee_category->delete();
        return redirect()->back()->with('success','Fee Category Deleted Successfully');
    }
}
