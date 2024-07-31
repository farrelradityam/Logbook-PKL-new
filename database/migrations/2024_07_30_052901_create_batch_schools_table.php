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
        Schema::create('batch_schools', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('school_id');
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_schools');
    }
};
