<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageList extends Model
{
    use HasFactory;

    protected $table = "sent_messages";

    protected $fillable = [
        "student_id",
        "sender_device",
        "recevier_number",
        "message_to",
        "message_gateway",
        "message_type",
        "message",
        "media_url",
        "message_send_by",
        "status",
    ];
}
