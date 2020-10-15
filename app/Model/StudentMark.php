<?php

namespace App\Model;
use App\User;

use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    public function student(){
    	return $this->belongsTo(User::class,'student_id','id');
    }
}
