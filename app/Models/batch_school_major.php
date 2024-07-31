<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batch_school_major extends Model
{
    use HasFactory;

    protected $table = 'batch_school_major';
    protected $primarykey ='id';
    protected $fillable = ['batch_school_id','msjor_id'];

}
