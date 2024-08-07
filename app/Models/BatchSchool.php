<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchSchool extends Model
{
    use HasFactory;

    protected $fillable = ['batch_id','school_id'];

    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function school(){
        return $this->belongsTo(School::class);
    }
}