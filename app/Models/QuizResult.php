<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;
    protected $fillable=['student_id','course_id','total_questions','correct_answers'];
    public function student()
    {
        return $this->belongsTo(student::class);
    }   
    public function quiz()
    {
        return $this->belongsTo(quiz::class);
    }   
}
