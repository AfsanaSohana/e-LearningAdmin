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
        Schema::create('batch_lecture_sheets', function (Blueprint $table) {
            $table->id();
             $table->integer('course_id');
            $table->integer('batch_id');
            $table->integer('subject_id');
            $table->string('l_sheet_name');
            $table->string('number_of_l_sheet');
            $table->integer('module_id');
            $table->integer('assignment_id')->nullable();
            $table->integer('exam_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_lecture_sheets');
    }
};
