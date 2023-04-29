<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function manageEnroll ()
    {
        return view('admin.enroll.manage', [
            'enrolls'   => Enroll::latest()->get(),
        ]);
    }

    public function editEnrollStatus ($id)
    {
        return view('admin.enroll.edit', [
            'enroll'    => Enroll::find($id),
        ]);
    }

    public function updateEnroll (Request $request, $id)
    {
        $enroll = Enroll::find($id);
        $enroll->payment_status = $request->payment_status;
        $enroll->enroll_status = $request->enroll_status;
        $enroll->save();
        return redirect('/manage-enroll')->with('message', 'Enroll Status Changed Successfully.');
    }

    public function deleteEnroll ($id)
    {
        $enroll = Enroll::find($id);
        $enroll->delete();
        return redirect()->back()->with('message', 'Enroll deleted Successfully.');
    }
}
