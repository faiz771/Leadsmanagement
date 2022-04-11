<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignlead extends Model
{
    use HasFactory;
    protected $fillable = ['project','user','lead'];

}
