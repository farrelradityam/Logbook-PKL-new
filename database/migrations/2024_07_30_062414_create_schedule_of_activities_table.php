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
        Schema::create('schedule_of_activities', function (Blueprint $table) {
            $table->id('id');
            $table->date('date');
            $table->unsignedBigInteger('batch_school_major_id');
            $table->foreign('batch_school_major_id')->references('id')->on('batch_school_majors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_of_activities');
    }
};
