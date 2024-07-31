<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;

    protected $table = 'activity';
    protected $primarykey ='id';
    protected $fillable = ['description','schedule_of_activity_id','student_id','user_id','validated_by_mentor_id'];

}
