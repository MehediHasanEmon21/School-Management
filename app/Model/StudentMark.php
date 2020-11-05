<?php

namespace App\Model;
use App\User;

use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
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

    public function exam(){
    	return $this->belongsTo('App\Model\ExamType','exam_type_id','id');
    }

    public function subject(){
    	return $this->belongsTo('App\Model\Subject','assign_subject_id','id');
    }
}
