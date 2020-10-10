<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    public function user(){
    	return $this->belongsTo('App\User','employee_id','id');
    }

    protected $with = ['user'];
}
