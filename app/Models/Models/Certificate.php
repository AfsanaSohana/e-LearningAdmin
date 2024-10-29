<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable=['student_id,','course_id','instructor_id','passing_date','director'];
   
    public function student()
   {
       return $this->belongsTo(student::class);
   }     
    public function course()
   {
       return $this->belongsTo(course::class);
   }    
    public function instructor()
   {
       return $this->belongsTo(instructor::class);
   }    
  


}
