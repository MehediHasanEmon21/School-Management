<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Model\AccountOtherCost;
use Illuminate\Http\Request;

class OtherCostController extends Controller
{
    public function view(){

    	$costs = AccountOtherCost::orderBy('id','DESC')->get();
    	return view('pages.account.cost.list',compact('costs'));

    }

    public function create(){
    	
    	return view('pages.account.cost.create');
    }

    public function store(Request $request){

    	
    	$account_other_cost = new AccountOtherCost();
    	$account_other_cost->date = $request->date;
    	$account_other_cost->amount = $request->amount;
    	$account_other_cost->description = $request->description;
    	$account_other_cost->save();
    	return redirect()->route('other.cost.view')->with('success','Other Cost Added Successfully');
 


    }

      public function edit($id){

        $data['editData'] = AccountOtherCost::find($id);
        return view('pages.account.cost.create',$data);

    }

    public function update(Request $request, $id){

    	$account_other_cost = AccountOtherCost::find($id);
    	$account_other_cost->date = $request->date;
    	$account_other_cost->amount = $request->amount;
    	$account_other_cost->description = $request->description;
    	$account_other_cost->save();
    	return redirect()->route('other.cost.view')->with('success','Other Cost Updated Successfully');

    }

    
}
