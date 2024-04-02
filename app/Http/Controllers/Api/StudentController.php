<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;

use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if ($students->isEmpty()) {

            $data = [
                'message' => 'There are no registered students',
                'status' => 200
            ];

            return response()->json($data, 200);
        }

        $data = [
            'students' => $students,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required',
            'course' => 'required',
            'lang' => 'required'
        ]);

        if ($validator->fails()){
            $data = [
                'message' => 'Data validation error', 
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        };

        $student = Student::create([
            'name' => $request->name,
            'email'=> $request->email,
            'phone' => $request->phone,
            'course' => $request->course,
            'lang' => $request->lang
        ]);

        if (!$student) {
            $data = [ 
                'message' => '',
                'status' => 400
            ];
        }

        $data = [
            'student' => $student,
            'status'=> 201
        ];

        return response()->json($data, 201);
    }
}
