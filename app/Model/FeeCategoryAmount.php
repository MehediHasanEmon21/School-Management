<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    public function fee_category(){
    	return $this->belongsTo('App\FeeCategory','fee_category_id','id');
    }

    public function class(){
    	return $this->belongsTo('App\Model\StudentClass','student_class_id','id');
    }
}
