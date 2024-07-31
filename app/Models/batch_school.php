<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batch_school extends Model
{
    use HasFactory;

    protected $table = 'batch_school';
    protected $primarykey = 'id';
    protected $fillable = ['batch_id','school_id'];

}
