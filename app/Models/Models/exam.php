<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;
    protected $fillable=['exam_name','subject_id','batch_id','duration','start_time','end_time','date'];
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }    
    public function batch()
    {
        return $this->belongsTo(batch::class);
    }   
   
    
}
