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
        'mentor_id', 
        'industry_advisor_id', 
    ];

    public function batchSchoolMajor(){
        return $this->belongsTo(BatchSchoolMajor::class);
    }

    public function mentor(){
        return $this->belongsTo(Mentor::class);
    }

    public function industryAdvisor(){
        return $this->belongsTo(IndustryAdvisor::class);
    }
}
