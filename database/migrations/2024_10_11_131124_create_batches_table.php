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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->string('batch_type');
            $table->string('duration');
            $table->integer('instructor_id');
            $table->integer('course_id');
            $table->string('number_of_student');
            $table->text('batch_details');
            $table->string('number_of_subject');
            $table->string('daily_live');
            $table->string('weekly_exam');
            $table->string('live_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
