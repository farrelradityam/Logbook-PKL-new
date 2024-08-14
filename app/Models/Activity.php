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

    public function scheduleOfActivity(){
        return $this->belongsTo(ScheduleOfActivity::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function validatedByMentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
