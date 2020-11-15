<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //registering our custom columns which we have define in migration

    protected $fillable = ["name","rollno","email","phone","image"];
}
