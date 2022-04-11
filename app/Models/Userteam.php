<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userteam extends Model
{
    use HasFactory;
    protected $fillable = ['fname','lname','contact','email','city_id','country_id','project_id','area_id','sources_id','desc','person_id'];

}
