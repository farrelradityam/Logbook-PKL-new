<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name',
        'phone_number',
        'batch_school_major_id', 
        'user_id',
    ];

    public function Batch_School_Major(){
        return $this->belongsTo(BatchSchoolMajor::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}