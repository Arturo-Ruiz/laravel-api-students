<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        if ($students->isEmpty()) {

            $data = [
                'message' => 'There are no registered students',
                'status' => 200
            ];

            return response()->json($data, 200);
        }

        return respose()->json($students, 200);
    }
}
