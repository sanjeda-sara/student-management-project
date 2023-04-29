<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use App\Models\StudentData;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PageViewController extends Controller
{
    protected $subject;
    protected $user;
    protected $student;
    protected $check = true;
    public function home ()
    {
        return view('front.home.home', [
            'subjects'  => Subject::where('status', 1)->latest()->get(),
        ]);
    }

    public function subjectDetails ($id)
    {
        $this->subject = Subject::find($id);
        $this->subject->hit_count   = $this->subject->hit_count +1;
        $this->subject->save();
        $enrollStatus   = Enroll::where('subject_id', $id)->where('user_id', Auth::id())->first();
        if ($enrollStatus)
        {
            $this->check = false;
        }
        return view('front.subject.details', [
            'subject'   => Subject::find($id),
            'check'     => $this->check,
        ]);
    }

    public function enroll ($id)
    {
        if (Auth::check())
        {
            $enroll = Enroll::newEnroll($id);
            $auth   = Auth::user();
            $data = [
                'enroll'    => $enroll,
                'auth'      => $auth,
                'subject'   => Subject::find($id),
            ];
            Mail::send('front.mail', $data, function ($message) use ($data) {
                $message->to(Auth::user()->email)->subject('Message from BITM');
            });
            return redirect()->back()->with('message', 'Enroll request placed successfully.');
        } else {
            Session::put('subject_id', $id);
            return redirect()->route('user-login');
        }
    }

    public function userLogin ()
    {
        if (!Auth::check())
        {
            return view('front.auth.user-login');
        } else {
            return redirect()->back();
        }

    }
    public function userRegister ()
    {
        if (!Auth::check())
        {
            return view('front.auth.user-register');
        } else {
            return redirect()->back();
        }

    }

    public function userPostRegister (Request $request)
    {
//        return 'hello';
        if ($request->password == $request->password_confirmation)
        {
            $this->user = new User();
            $this->user->name = $request->name;
            $this->user->email = $request->email;
            $this->user->password = bcrypt($request->password);
            $this->user->save();
            Auth::login($this->user);
            $this->student = new StudentData();
            $this->student->name = $request->name;
            $this->student->email = $request->email;
            $this->student->phone = $request->phone;
            $this->student->user_id = $this->user->id;
            $this->student->save();
//            return Session::get('subject_id');
            if (Session::has('subject_id'))
            {
                $subjectId = Session::get('subject_id');
                Session::forget('subject_id');
                return redirect('subject-details/'.$subjectId);
            } else {
                return redirect('/');
            }

        } else {
            return redirect()->back()->with('message', 'Password and confirm password did not match.');
        }
    }
    public function userPostLogin (Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data))
        {
            if (Session::has('subject_id'))
            {
                $subjectId = Session::get('subject_id');
                Session::forget('subject_id');
                return redirect('subject-details/'.$subjectId);
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->back()->with('message','email or password is invalid.');
        }
    }
}
