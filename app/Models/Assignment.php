<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable=['assignment_name','subject_id','course_id','document','date'];
     public function subject()
    {
        return $this->belongsTo(subject::class);
    }    
    public function course()
    {
        return $this->belongsTo(course::class);
    }    
}
