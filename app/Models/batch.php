<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable=['batch_name', 'batch_type','duration','instructor_id','course_id','number_of_student','batch_details','number_of_subject','daily_live','weekly_exam','live_link','price','discount_price'];

    public function instructor()
    {
        return $this->belongsTo(instructor::class);
    }    
    public function course()
    {
        return $this->belongsTo(course::class)->with('courseplan');
    }    
    public function routine()
    {
        return $this->hasMany(routine::class);
    }    

}
