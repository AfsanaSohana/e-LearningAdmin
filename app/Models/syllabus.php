<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class syllabus extends Model
{
    use HasFactory;
    protected $fillable=['course_id','subject_id,','title','document'];
     public function subject()
    {
        return $this->belongsTo(subject::class);
    }    
     public function course()
    {
        return $this->belongsTo(course::class);
    }    
}
