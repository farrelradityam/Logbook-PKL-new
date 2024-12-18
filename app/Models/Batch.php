<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = ['year'];

    public function batchSchool() {
        return $this->hasOne(BatchSchool::class);
    }

    public function school() {
        return $this->belongsToMany(School::class, 'batch_schools',  'batch_id', 'school_id')->withTimestamps();
    }
}