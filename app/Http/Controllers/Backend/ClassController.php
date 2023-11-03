<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index() {
        return view("Backend.Class.index");
    }

    public function create() {
        return view("Backend.Class.create");
    }
}
