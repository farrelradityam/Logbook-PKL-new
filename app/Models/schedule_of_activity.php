<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule_of_activity extends Model
{
    use HasFactory;

    protected $table = 'schedule_of_activity';
    protected $primarykey = 'id';
    protected $fillable = ['date','batch_school_major_id'];

}
