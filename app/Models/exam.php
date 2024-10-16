<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;
    protected $fillable=['exam_name','duration','start_time','end_time','subject_id','batch_id'];
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }    
    public function course()
    {
        return $this->belongsTo(course::class);
    }   
    
}
