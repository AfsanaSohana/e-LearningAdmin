<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateApplyRequest extends Model
{
    use HasFactory;
     protected $fillable=['batch_id','course_id','student_id','enroll_date','trans_id'];
       public function BatchEnroll()
     {
        return $this->belongsTo(BatchEnroll::class)->with('batch','course','student');
    }
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

   
}
}
