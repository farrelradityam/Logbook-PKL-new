<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id('id');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('schedule_of_activity_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('validated_by_mentor_id');
            $table->foreign('schedule_of_activity_id')->references('id')->on('schedule_of_activities');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('validated_by_mentor_id')->references('id')->on('mentors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
