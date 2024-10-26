<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batchEnroll extends Model
{
    use HasFactory;
    protected $fillable=['batch_id','course_id','student_id','enroll_date','fees','trans_number_id','trans_id_id','payment_method_id'];

    public function batch()
    {
        return $this->belongsTo(batch::class);
    }    
    public function course()
    {
        return $this->belongsTo(course::class);
    }    
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }    
    public function batchEnrollRequest()
    {
        return $this->belongsTo(batchEnrollRequest::class);
    }    
    
}
