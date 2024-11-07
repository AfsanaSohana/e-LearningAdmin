<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=['course_name', 'details'];
    public function courseplan()
    {
        return $this->hasMany(CoursePlan::class);
    }  
}
