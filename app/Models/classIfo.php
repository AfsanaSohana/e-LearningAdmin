<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classIfo extends Model
{
    use HasFactory; 
    protected $fillable=['course_id','batch_id','subject_id','batch_banner_id','class_time_id','class_day','instructor_id','instructo_details_id'];
    public function course()
    {
        return $this->belongsTo(course::class);
    }
     public function batch()
    {
        return $this->belongsTo(batch::class);
    }
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }
    public function routine()
    {
        return $this->belongsTo(routine::class);
    }
    public function instructor()
    {
        return $this->belongsTo(instructor::class);
    }
}
