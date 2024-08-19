<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = ['year'];

    public function batchSchool() {
        return $this->hasMany(BatchSchool::class);
    }
}