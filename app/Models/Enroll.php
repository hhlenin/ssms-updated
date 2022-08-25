<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Course;

class Enroll extends Model
{
    use HasFactory;

    protected static $enroll;

    public static function storeEnroll($course_id, $student_id, $payment_type)
    {
       self::$enroll = new Enroll();
       self::$enroll->course_id = $course_id;
       self::$enroll->student_id = $student_id;
       self::$enroll->enroll_date = date('Y-m-d');
       self::$enroll->enroll_timestamp = strtotime(date('Y-m-d'));
       self::$enroll->payment_type = $payment_type;
       self::$enroll->status = 0;
       self::$enroll->save();
       return self::$enroll;
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
}
