<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountStudentFee extends Model
{
     public function student(){
    	return $this->belongsTo('App\User','student_id','id');
    }
    public function class(){
    	return $this->belongsTo('App\Model\StudentClass','class_id','id');
    }
    public function year(){
    	return $this->belongsTo('App\Model\Year','year_id','id');
    }

    public function fee_category(){
    	return $this->belongsTo('App\FeeCategory','fee_category_id','id');
    }
    
}
