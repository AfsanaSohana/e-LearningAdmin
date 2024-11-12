<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;
      protected $fillable=['course_id','batch_id','module_1','module_2','module_3','module_4'];
    public function course()
    {
        return $this->belongsTo(course::class);
    }    
    public function batch()
    {
        return $this->belongsTo(batch::class);
    }   
}
