<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userteam extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id'];
    protected $casts = [
        'user_id' => 'array',
    ];

}
