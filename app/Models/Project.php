<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['developer','name','contact','about','project_img','floor_plan','payment_plan','project_booklet','socialmedia_links','location'];
}
