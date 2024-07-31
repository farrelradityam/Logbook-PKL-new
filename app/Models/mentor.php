<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mentor extends Model
{
    use HasFactory;

    protected $table = 'mentor';
    protected $primarykey = 'id';
    protected $fillable = ['name','user_id'];

}
