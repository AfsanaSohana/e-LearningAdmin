<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;
    protected $fillable=['student_id','quiz_id','total_questions','correct_answers','score'];
    public function student()
    {
        return $this->belongsTo(student::class);
    }   
    public function quiz()
    {
        return $this->belongsTo(quiz::class);
    }   
}
