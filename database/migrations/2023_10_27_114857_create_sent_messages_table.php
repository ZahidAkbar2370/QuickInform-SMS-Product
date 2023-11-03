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
        Schema::create('sent_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id");
            $table->string("sender_device");
            $table->string("recevier_number");
            $table->enum("message_to", ["students", "parents", "teachers", "all"]);
            $table->enum("message_gateway", ["whatsapp", "email", "sms", "portal", "all"]);
            $table->enum("message_type", ["text", "image", "documemt", "template"]);
            $table->string("message");
            $table->string("media_url")->nullable();
            $table->string("message_send_by")->nullable();
            $table->enum("status", ["sent", "error", "pending"])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sent_messages');
    }
};
