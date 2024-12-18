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
        Schema::create('students', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->nullable();
            $table->string('phone_number');
            $table->unsignedBigInteger('batch_school_major_id');
            $table->unsignedBigInteger('mentor_id');
            $table->unsignedBigInteger('industry_advisor_id');
            $table->foreign('batch_school_major_id')->references('id')->on('batch_school_majors');
            $table->foreign('mentor_id')->references('id')->on('mentors');
            $table->foreign('industry_advisor_id')->references('id')->on('industry_advisors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
