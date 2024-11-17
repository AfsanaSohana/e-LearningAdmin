<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batchLectureSheet extends Model
{
    use HasFactory;
    protected $fillable=['course_id','batch_id','subject_id','l_sheet_name','number_of_l_sheet','module_id','assignment_id','exam_id'];
     public function course()
    {
        return $this->belongsTo(course::class);
    }
     public function batch()
    {
        return $this->belongsTo(batch::class)->with('module','assignment','exam');
    }
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }
    public function module()
    {
        return $this->belongsTo(module::class);
    }
    public function exam()
    {
        return $this->belongsTo(exam::class);
    }
    public function assignment()
    {
        return $this->belongsTo(assignment::class);
    }

}
