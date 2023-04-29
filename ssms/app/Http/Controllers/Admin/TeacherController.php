<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    protected $teacher;
    public function createProfile ()
    {
        $this->teacher = Teacher::where('user_id', Auth::id())->first();
        return view('teacher.profile.create',[
            'teacher'   => $this->teacher,
        ]);
    }

    public function newProfile (Request $request, $id=null)
    {
        Teacher::saveData($request, $id);
        return redirect()->back()->with('message', 'Profile created successfully...');
    }

    public function manageProfile()
    {
        return view('teacher.profile.manage', [
            'teachers'  => Teacher::all(),
        ]);
    }

    public function editProfile ($id)
    {
        return view('teacher.profile.edit', [
            'teacher'   => Teacher::find($id),
        ]);
    }

    public function updateProfile (Request $request, $id)
    {
        Teacher::saveData($request, $id);
        return redirect('/manage-profile')->with('message', 'Teacher Updated successfully.');
    }

    public function deleteProfile($id)
    {
        return redirect()->back()->with('message', 'profile deleted successfully');
    }

    public function profileStatus ($id)
    {

    }

}
