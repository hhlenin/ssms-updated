<?php

namespace App\Models;

use App\Helper\ImageURL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
    protected static $student;
    protected static $directory = 'db/images/student/';

    public static function storeStudent($input, $id = null)
    { 
        !isset($id)? self::$student = new Student(): self::$student = Student::find($id);
        
        
        self::$student->name = $input['name'];
        self::$student->email = $input['email'];
        !isset($input['password'])? self::$student->password = Hash::make($input['phone']): self::$student->password = Hash::make($input['password']);
        isset($input['image'])? self::$student->image = ImageURL::getImageURL($input['image'], self::$directory, self::$student->image) : '';

        isset($input['phone'])? self::$student->phone = $input['phone'] : '';
        isset($input['address'])? self::$student->address = $input['address'] : '';

        self::$student->save();
        return self::$student;

    }
}
