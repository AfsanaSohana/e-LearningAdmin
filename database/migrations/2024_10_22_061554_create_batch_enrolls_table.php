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
        Schema::create('batch_enrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('batch_id');
            $table->integer('course_id');
            $table->integer('student_id');
            $table->date('enroll_date');
            $table->integer('fees_id');
            $table->integer('trans_number_id');
            $table->integer('trans_id_id');
            $table->integer('payment_method-id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_enrolls');
    }
};
