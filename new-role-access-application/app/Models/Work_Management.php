<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_Management extends Model
{
    use HasFactory;
    protected $table = 'work_management';
    protected $fillable = ['title', 'description', 'user_id','role_id', 'status'];
    
}
