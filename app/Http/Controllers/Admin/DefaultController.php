<?php

namespace App\Http\Controllers\Admin;

use App\AssignStudent;
use App\AssignSubject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getSubject(Request $request){



    	$class_id = $request->class_id;

    	$subjects = AssignSubject::with(['subject'])->where('class_id',$class_id)->get();
    	return response()->json($subjects);

    }

    public function getStudent(Request $request){

    	$class_id = $request->class_id;
    	$year_id = $request->year_id;

    	$allData = AssignStudent::with(['student'])->where('class_id',$class_id)->where('year_id',$year_id)->get();
    	return response()->json($allData);

    }
}
