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
        Schema::create('certificate_apply_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('batch_id');
            $table->integer('course_id');
            $table->integer('enroll_date');
            $table->integer('trans_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_apply_requests');
    }
};
