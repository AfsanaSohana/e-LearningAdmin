<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examResult extends Model
{
    use HasFactory;
    protected $fillable=['exam_id','course_id','subject_id','start_time','end_time','obtain_number','status'];
     public function exam()
    {
        return $this->belongsTo(exam::class);
    }    
    public function course()
    {
        return $this->belongsTo(course::class);
    }  
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }  
}
