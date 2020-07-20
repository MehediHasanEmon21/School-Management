<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    public function class(){
    	return $this->belongsTo('App\Model\StudentClass','class_id','id');
    }

    public function subject(){
    	return $this->belongsTo('App\Model\Subject','subject_id','id');
    }

}
