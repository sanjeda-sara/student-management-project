<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Enroll extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static $enroll;

    public static function newEnroll ($id)
    {
        self::$enroll               = new Enroll();
        self::$enroll->subject_id   = $id;
        self::$enroll->user_id      = Auth::id();
        self::$enroll->enroll_date  = date('Y-m-d');
        self::$enroll->save();
        return self::$enroll;
    }

    public function subject ()
    {
        return $this->belongsTo(Subject::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
