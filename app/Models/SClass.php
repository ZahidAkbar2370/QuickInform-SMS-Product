<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SClass extends Model
{
    use HasFactory;

    protected $table = "classes";

    protected $fillable = [
        "class_name",
        "medium",
    ];
}
