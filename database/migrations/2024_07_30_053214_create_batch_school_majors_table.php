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
        Schema::create('batch_school_majors', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('batch_school_id');
            $table->unsignedBigInteger('major_id');
            $table->foreign('batch_school_id')->references('id')->on('batch_schools');
            $table->foreign('major_id')->references('id')->on('majors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_school_majors');
    }
};
