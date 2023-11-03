<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkSheet extends Model
{
    use HasFactory;

    protected $table = "marksheets";

    protected $fillable = [
        "test_name",
        "student_id",
        "class_id",
        "subject_id",
        "totle_marks",
        "obtained_marks",
        "percentage",
        "optional_note",
    ];
}
