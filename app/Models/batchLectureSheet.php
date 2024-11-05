<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batchLectureSheet extends Model
{
    use HasFactory;
    protected $fillable=['course_id','batch_id','subject_id','l_sheet_name','number_of_l_sheet'];
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
}
