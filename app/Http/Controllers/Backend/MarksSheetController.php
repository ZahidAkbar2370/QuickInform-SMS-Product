<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SClass;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MarksSheetController extends Controller
{
    public function create() {
        $classes = SClass::all();

        return view("Backend.MarksSheet.create", compact('classes'));
    }

    function getSubjectThroughClass($class_id) {
        $subjects = Subject::where("class_id", $class_id)->get();

        return Response::json($subjects);
    }

    function getStudentsThroughClass($class_id) {
        $students = Student::with('users')->where("class_id", $class_id)->get();

        return Response::json($students);
    }
}
