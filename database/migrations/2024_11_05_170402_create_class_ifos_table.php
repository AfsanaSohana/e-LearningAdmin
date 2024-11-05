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
        Schema::create('class_ifos', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('batch_id');
            $table->integer('batch_banner_id');
            $table->integer('class_time_id');
            $table->integer('class_day');
            $table->integer('subject_id');
            $table->integer('instructor_id');
            $table->integer('instructo_details_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_ifos');
    }
};
