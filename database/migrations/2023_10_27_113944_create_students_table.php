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
            $table->id();
            $table->foreignId("user_id")->nullable();
            $table->foreignId("class_id");
            $table->string("father_name");
            $table->string("father_mobile_number")->nullable();
            $table->string("student_mobile_number")->nullable();
            $table->enum("fee_type", ["monthly", "yearly"])->default("monthly");
            $table->string("fee_amount")->default(0);
            $table->enum("status", ["pending" , "active", "completed", "inactive", "left"]);
            $table->string("optional_note")->nullable();
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
