<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    public function student(){
    	return $this->belongsTo(User::class,'student_id','id');
    }
    public function class(){
    	return $this->belongsTo('App\Model\StudentClass','class_id','id');
    }
    public function year(){
    	return $this->belongsTo('App\Model\Year','year_id','id');
    }
    public function discount_student(){
    	return $this->belongsTo('App\DiscountStudent','id','assign_student_id');
    }
}
