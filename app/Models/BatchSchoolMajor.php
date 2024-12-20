<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchSchoolMajor extends Model
{
    use HasFactory;

    protected $fillable = ['batch_school_id','major_id'];

    public function student() {
        return $this->hasMany(Student::class);
    }

    public function scheduleOfAtivity() {
        return $this->hasMany(ScheduleOfActivity::class);
    }

    public function batchSchool(){
        return $this->belongsTo(BatchSchool::class);
    }

    public function major(){
        return $this->belongsTo(Major::class);
    }
}