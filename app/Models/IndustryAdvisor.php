<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryAdvisor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number'];

    public function student(){
        return $this->hasMany(Student::class);
    }
}
