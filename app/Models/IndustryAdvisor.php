<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryAdvisor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'activity_id', 'schedule_of_activity_id'];

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function scheduleOfActivity(){
        return $this->belongsTo(ScheduleOfActivity::class);
    }

}
