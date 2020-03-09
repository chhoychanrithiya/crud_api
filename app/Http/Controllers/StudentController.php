<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function create(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->email = strtolower($request->email);
        $student->phone = $request->phone;
        $student->password = Hash::make($request->password);
        $student->save();

        return json_encode(['result' => 'create success']);
    }
    public function read(){
        $student = Student::all();
        return response()->json($student);
    }

}
