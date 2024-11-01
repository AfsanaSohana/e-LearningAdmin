<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routine extends Model
{
    use HasFactory;
    protected $fillable=['batch_id','day_name','rdate','start_time','end_time','note'];
    public function batch()
    {
        return $this->belongsTo(batch::class);
    } 
}
