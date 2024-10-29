<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendence extends Model
{
    use HasFactory;
    protected $fillable=['subject_id','course_id','student_id','date','status'];

    public function subject()
    {
        return $this->belongsTo(subject::class);
    }    
    public function course()
    {
        return $this->belongsTo(course::class);
    }    
    public function student()
    {
        return $this->belongsTo(student::class);
    }    
}
