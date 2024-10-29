<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePlan extends Model
{
    use HasFactory;
    protected $fillable=['course_id','Subject_id','title'];
   
    public function course()
    {
        return $this->belongsTo(course::class);
    }  
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }    
     
}
