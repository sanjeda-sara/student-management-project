<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $student;
    public function createStudentInfo ()
    {
        $this->student = StudentData::where('user_id', Auth::id())->first();
        return view('student.student.create',[
            'student'   => $this->student,
        ]);
    }

    public function newStudentInfo (Request $request)
    {
        StudentData::saveStudentInfo($request);
        return redirect()->back()->with('message', 'Student Info saved successfully.');
    }

    public function manageStudentInfo ()
    {
        return view('student.student.manage', [
            'students'  => StudentData::latest()->get(),
        ]);
    }

    public function editStudentInfo($id)
    {
        return view('student.student.edit', [
            'student'   => StudentData::find($id),
        ]);
    }

    public function updateStudentInfo (Request $request, $id)
    {
        return $request;
    }

    public function deleteStudentInfo ($id)
    {
        return redirect()->back()->with('message','Student Info deleted successfully');
    }

    public function profileStatus ($id)
    {

    }
}
