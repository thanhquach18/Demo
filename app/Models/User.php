<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function addRow($name, $email, $password) {
        if(User::where(['email' => $email])->exists()) return true;
        $erp = new User();
        $erp->name = $name;
        $erp->email = $email;
        $erp->password = Hash::make($password);
        if($erp->save()) return true;

        return false;
    }
    //
    public static function login($email, $password) {
        $login = User::where(['email' => $email])->first(); 
        if (!is_null($login) && Hash::check($password, $login->password)) {
            return $login;
        }

        return null;
    }
}
