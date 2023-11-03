<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $fillable = [
        "user_id",
        "class_id",
        "father_name",
        "father_mobile_number",
        "student_mobile_number",
        "fee_type",
        "fee_amount",
        "status",
        "optional_note",
    ];

    public function users() {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
