<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = 'student';
    protected $primarykey = 'id';
    protected $fillable = ['name','phone_number','batch_school_major_id', 'user_id'];

}
