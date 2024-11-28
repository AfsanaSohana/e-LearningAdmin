<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable=['course_id','question','options_1','options_1','options_3','options_4','correct_answer'];
     public function course()
    {
        return $this->belongsTo(course::class);
    }
}
