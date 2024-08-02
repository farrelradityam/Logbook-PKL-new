<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchSchoolMajor extends Model
{
    use HasFactory;

    protected $fillable = ['batch_school_id','msjor_id'];

    public function Batch_School(){
        return $this->belongsTo(BatchSchool::class);
    }

    public function Major(){
        return $this->belongsTo(Major::class);
    }
}