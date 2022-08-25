<?php

namespace App\Models;

use App\Helper\ImageURL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name','email', 'password', 'status'];

    protected static $teacher;

    public static function storeTeacher($input, $id = null)
    {
        if (!isset($id)){
            self::$teacher              = new Teacher();
        }
        elseif (isset($id)) {
            self::$teacher              = Teacher::find($id);
        }
        self::$teacher->name            = $input['name'];
        self::$teacher->email           = $input['email'];
        if (isset($input['password'])) {
            self::$teacher->password    = Hash::make($input['password']);
        }
        self::$teacher->phone           = $input['phone'];
        self::$teacher->address         = $input['address'];
        if(isset($input['nid'])){
            self::$teacher->nid         = $input['nid'];
        }
        
        if(isset($input['image'])){
            self::$teacher->image       = ImageURL::getImageURL($input['image'], 'db/images/teacher/', self::$teacher->image, isset(self::$teacher->image)? self::$teacher->image : null);
        }
    
        if(isset($input['district_id'])){
            self::$teacher->district_id = $input['district_id'];
        }
        if (isset($input['status'])) {
            self::$teacher->status      = $input['status']; 
        }
        else {
            self::$teacher->status      =  1;

        }
        isset($input['designation']) ? self::$teacher->designation = $input['designation'] : '';
        isset($input['link_1']) ? self::$teacher->link_1 = $input['link_1'] : '';
        isset($input['link_2']) ? self::$teacher->link_2 = $input['link_2'] : '';
        isset($input['link_3']) ? self::$teacher->link_3 = $input['link_3'] : '';
        isset($input['link_4']) ? self::$teacher->link_4 = $input['link_4'] : '';
        self::$teacher->save();
    }
}
