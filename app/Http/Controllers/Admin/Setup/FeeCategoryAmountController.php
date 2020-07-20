<?php

namespace App\Http\Controllers\Admin\Setup;

use App\FeeCategory;
use App\Http\Controllers\Controller;
use App\Model\FeeCategoryAmount;
use App\Model\StudentClass;
use Illuminate\Http\Request;

class FeeCategoryAmountController extends Controller
{
    public function index(){

    	$fee_category_amounts = FeeCategoryAmount::with(['fee_category'])->select('fee_category_id')->groupBy('fee_category_id')->orderBy('id','DESC')->get();
    	return view('pages.setup.fee-category-amount.list',compact('fee_category_amounts'));

    }

    public function create(){
    	
    	$fee_categories = FeeCategory::orderBy('name','ASC')->get();
    	$student_classes = StudentClass::get();
    	return view('pages.setup.fee-category-amount.create',compact('fee_categories','student_classes'));
    }

    public function store(Request $request){

         $student_class_id = count($request->student_class_id);
         if ($student_class_id !=NULL) {
             for ($i=0; $i < $student_class_id; $i++) { 
               $fee_amount = new FeeCategoryAmount();
               $fee_amount->fee_category_id = $request->fee_category_id;
               $fee_amount->student_class_id = $request->student_class_id[$i];
               $fee_amount->amount = $request->amount[$i];
               $fee_amount->save();
            }
         }
        
    	return redirect()->route('student.fee.amount.view')->with('success','Fee Category Amount Added Successfully');
 


    }

      public function edit($fee_category_id){

        $editDatas = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->get();
        $fee_categories = FeeCategory::orderBy('name','ASC')->get();
        $student_classes = StudentClass::get();

        return view('pages.setup.fee-category-amount.edit',compact('editDatas','fee_categories','student_classes'));

    }

    public function update(Request $request, $fee_category_id){

        if ($request->student_class_id == NULL) {
            return redirect()->back()->with('error','Sorry You do not select any item');
        }else{
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
            $student_class_id = count($request->student_class_id);
             for ($i=0; $i < $student_class_id; $i++) { 
               $fee_amount = new FeeCategoryAmount();
               $fee_amount->fee_category_id = $request->fee_category_id;
               $fee_amount->student_class_id = $request->student_class_id[$i];
               $fee_amount->amount = $request->amount[$i];
               $fee_amount->save();
            }
        

        }

        return redirect()->route('student.fee.category.view')->with('success','Fee Category Amount Updated Successfully');

    }

    public function details($fee_category_id){
        $details = FeeCategoryAmount::with(['fee_category','class'])->where('fee_category_id',$fee_category_id)->get();
        return view('pages.setup.fee-category-amount.details',compact('details'));
    }
}
