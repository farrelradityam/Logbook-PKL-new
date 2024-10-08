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
        Schema::create('industry_advisors', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('schedule_of_activity_id');
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('schedule_of_activity_id')->references('id')->on('schedule_of_activities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industry_advisors');
    }
};
