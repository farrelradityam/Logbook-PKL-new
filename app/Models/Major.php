<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = ['code','name'];

    public function batchSchoolMajor() {
        return $this->hasMany(BatchSchoolMajor::class);
    }

    public function school() {
        return $this->belongsToMany(School::class, 'batch_school_majors',  'major_id', 'batch_school_id')->withTimestamps();
    }
}