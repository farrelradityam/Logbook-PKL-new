<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'schedule_of_activity_id',
        'student_id',
        'user_id',
        'validated_by_mentor_id',
    ];

    public function Schedule_Of_Activity(){
        return $this->belongsTo(ScheduleOfActivity::class);
    }

    public function Student(){
        return $this->belongsTo(Student::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Validated_by_Mentor(){
        return $this->belongsTo(Mentor::class);
    }
}