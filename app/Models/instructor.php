<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructor extends Model
{
    use HasFactory;
    protected $fillable=['instructor_name', 'designation','contact_number','email','fb_id','insta_id','twt_id'];
}
