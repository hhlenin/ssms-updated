<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Helper\ImageURL;

class Course extends Model
{
    use HasFactory;
    protected static $course;

    protected $fillable = ['status', 'rejection_cause'];

    public static function storeCourse($input, $id = null)
    {
        if (!isset($id)) {
            self::$course = new Course();
        } else {
            self::$course = Course::find($id);
        }

        self::$course->teacher_id = Session::get('teacher_id');
        self::$course->name = $input['name'];
        self::$course->start_date = $input['start_date'];
        self::$course->start_timestamp = strtotime($input['start_date']);
        self::$course->end_date = $input['end_date'];
        self::$course->end_timestamp = strtotime($input['end_date']);
        self::$course->fee = $input['fee'];
        self::$course->short_description = $input['short_description'];
        self::$course->long_description = $input['long_description'];

        if (isset($input['image'])) {
            self::$course->image = ImageURL::getImageURL($input['image'], 'db/images/courses/', self::$course->image);
        }
        if (isset($input['rejection_cause'])) {
            self::$course->rejection_cause = $input['rejection_cause'];
            self::$course->status = 2;
        }

        self::$course->save();
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
    
}
