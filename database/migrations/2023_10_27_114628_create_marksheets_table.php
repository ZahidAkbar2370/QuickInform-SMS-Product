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
        Schema::create('marksheets', function (Blueprint $table) {
            $table->id();
            $table->string("test_name");
            $table->foreignId("student_id");
            $table->foreignId("class_id");
            $table->foreignId("subject_id");
            $table->string("totle_marks");
            $table->string("obtained_marks");
            $table->string("percentage");
            $table->string("optional_note");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marksheets');
    }
};
