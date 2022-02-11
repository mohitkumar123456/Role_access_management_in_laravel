<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMapPage extends Model
{
    use HasFactory;

    protected $table = 'role_map_page';
    protected $fillable = ['id', 'role_id', 'page'];
}
