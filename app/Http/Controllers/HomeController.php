<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Model\AccountOtherCost;
use App\Model\Supplier;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $data['total_students'] = User::where('userType','student')->get()->count();
        $data['total_teachers'] = User::where('userType','employee')->get()->count();
        $data['total_operators'] = User::where('role','operator')->get()->count();
        $data['today_cost'] = AccountOtherCost::where('date',date('Y-m-d'))->sum('amount');
        $data['male_students'] = User::where('userType','student')->where('gender','Male')->get()->count();
        $data['female_students'] = User::where('userType','student')->where('gender','Female')->get()->count();

        return view('pages.home',$data);
    }
}
