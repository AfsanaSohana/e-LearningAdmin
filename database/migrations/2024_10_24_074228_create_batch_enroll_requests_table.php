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
        Schema::create('batch_enroll_requests', function (Blueprint $table) {
            $table->id();
             $table->integer('batch_id');
            $table->integer('course_id');
            $table->integer('student_id');
            $table->date('enroll_date');
            $table->string('fees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_enroll_requests');
    }
};
