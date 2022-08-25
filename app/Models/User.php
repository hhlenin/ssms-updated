<?php

namespace App\Models;

use App\Helper\ImageURL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected static $user;
    protected static $directory = 'db/images/user/';

    public static function storeUser($input, $id = null)
    {
        if (isset($id)) {
            self::$user = User::find($id);
        }
        elseif (!isset($id)) {
            self::$user = new User();
        }
        self::$user->name = $input['name'];
        self::$user->email = $input['email'];
        if (isset($input['password'])){
            self::$user->password = Hash::make($input['password']);
        }
        isset($input['phone'])? self::$user->phone = $input['phone'] : '';
        isset($input['address'])? self::$user->address = $input['address'] : '';
        if (isset($input['image'])) {
            self::$user->image = ImageURL::getImageURL($input['image'], self::$directory, self::$user->image);
        }
        
        self::$user->save();
        

        
    }



}
