<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable=['batch_name', 'batch_type','duration','instructor_id','course_id'];

    public function instructor()
    {
        return $this->belongsTo(instructor::class);
    }    
    public function course()
    {
        return $this->belongsTo(course::class);
    }    
    
}
