<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batchEnrollRequest extends Model
{
    use HasFactory;
    protected $fillable=['batch_id','course_id','student_id','status','enroll_date','fees','trans_number','trans_id','payment_method'];
    public function batch()
    {
        return $this->belongsTo(batch::class);
    }
    public function course()
    {
        return $this->belongsTo(course::class);
    }
    public function student()
    {
        return $this->belongsTo(student::class);
    }
    public function batchEnroll()
    {
        return $this->belongsTo(BatchEnroll::class);
    }
}
