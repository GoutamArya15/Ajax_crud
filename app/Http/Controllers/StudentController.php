<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:students,email|email',
            'phone' => 'required|numeric|max_digits:10',
            'course' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'errors' => $validator->messages()
                ]
            );
        } else {
            $student = new Student();
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->course = $request->input('course');
            $student->save();
            return response()->json([
                'status' => 200,
                'success' => 'Student Data is Successful Created'
            ]);
        }
        // $student = new Student();
    }

    public function fetch_students()
    {
        $students = Student::all();
        return response()->json([
            'students' => $students
        ]);
    }

    public function  edit_student($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'message' => $student,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'student not found',
            ]);
        }
    }

    public function update_student(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|max_digits:10',
            'course' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'errors' => $validator->messages()
                ]
            );
        } else {
            $student = Student::find($id);
            if ($student) {
                $student->name = $request->input('name');
                $student->email = $request->input('email');
                $student->phone = $request->input('phone');
                $student->course = $request->input('course');
                $student->update();
                return response()->json([
                    'status' => 200,
                    'success' => 'Student Data is Successful Updated'
                ]);
            } else {
                return response()->json(
                    [
                        'status' => 400,
                        'errors' => 'somthing wen wrong'
                    ]
                );
            }
        }
    }

    public function  delete_student($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status' =>  200,
            'message' => "Deleted successfull"
        ]);
    }
}
