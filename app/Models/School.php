<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name','address'];

    public function batchSchool() {
        return $this->hasMany(BatchSchool::class);
    }
    
    public function batch() {
        return $this->belongsToMany(Batch::class, 'batch_schools',  'school_id', 'batch_id')->withTimestamps();
    }

    public function batchSchoolMajor() {
        return $this->belongsToMany(Major::class, 'batch_school_majors',  'batch_school_id', 'major_id')->withTimestamps();
    }
}