<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleOfActivity extends Model
{
    use HasFactory;

    protected $fillable = ['date','batch_school_major_id'];

    public function activity(){
        return $this->hasMany(Activity::class);
    }

    public function batchSchoolMajor(){
        return $this->belongsTo(BatchSchoolMajor::class);
    }
}