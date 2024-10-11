<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;
    protected $fillable=['exam_name', 'exam_date','start_time','end_time','subject_id','batch_id'];
}
