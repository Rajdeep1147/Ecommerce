<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $table = "students";
    public $fillable = ['name','email','phone','address','image'];

    public function getData()
    {
        return static::get();
    }
}
