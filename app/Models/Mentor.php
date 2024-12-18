<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone_number'];

    public function student(){
        return $this->hasMany(Student::class);
    }

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn () => ($this->gender === 'l' ? 'Bapak' : 'Ibu') . ' ' . $this->name,
        );
    }

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucwords(str_replace('_', '', $value)),
        );
    }
}
