<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Model\AccountEmployeeSalary;
use App\Model\AccountOtherCost;
use App\Model\AccountStudentFee;
use Illuminate\Http\Request;
use PDF;

class ProfitController extends Controller
{
    public function view(){

    	return view('pages.report.profit-view');

    }

    public function getProfit(Request $request){

    	$start_date = date('Y-m-d',strtotime($request->start_date));
    	$end_date = date('Y-m-d',strtotime($request->end_date));

    	$s_date = date('Y-m',strtotime($request->start_date));
    	$e_date = date('Y-m',strtotime($request->end_date));

    	$salary_cost = AccountEmployeeSalary::whereBetween('date',[$s_date,$e_date])->sum('amount');
    	$other_cost = AccountOtherCost::whereBetween('date',[$start_date,$end_date])->sum('amount');

    	$total_cost = $salary_cost + $other_cost;

    	$student_fee = AccountStudentFee::whereBetween('date',[$s_date,$e_date])->sum('amount');

    	$profit = $student_fee - $total_cost;

    	if ($profit < 0) {
    		$final_profit = 0;
    	}else{
    		$final_profit = $profit;
    	}

    	return response()->json([

    		'salary_cost' => $salary_cost,
    		'other_cost' => $other_cost,
    		'total_cost' => $total_cost,
    		'student_fee' => $student_fee,
    		'profit' => $final_profit,
    		'start_date' => $start_date,
    		'end_date' => $end_date,

    	]);

    }

    public function pdf(Request $request){

    	$data['start_date'] = date('Y-m-d',strtotime($request->start_date));
    	$data['end_date'] = date('Y-m-d',strtotime($request->end_date));

    	$data['s_date'] = date('Y-m',strtotime($request->start_date));
    	$data['e_date'] = date('Y-m',strtotime($request->end_date));

    	$data['salary_cost'] = AccountEmployeeSalary::whereBetween('date',[$data['s_date'],$data['e_date']])->sum('amount');
    	$data['other_cost'] = AccountOtherCost::whereBetween('date',[$data['start_date'],$data['end_date']])->sum('amount');

    	$data['total_cost'] = $data['salary_cost'] + $data['other_cost'];

    	$data['student_fee'] = AccountStudentFee::whereBetween('date',[$data['s_date'],$data['e_date']])->sum('amount');

    	$data['profit'] = $data['student_fee'] - $data['total_cost'];

    	if ($data['profit'] < 0) {
    		$data['final_profit'] = 0;
    	}else{
    		$data['final_profit'] = $data['profit'];
    	}

    	$pdf = PDF::loadView('pages.report.profit-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }
}
