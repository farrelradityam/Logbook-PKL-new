<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_id'];

    public function activity(){
        return $this->hasMany(Activity::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
