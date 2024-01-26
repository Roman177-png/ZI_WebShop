<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    
    protected $table  = 'users';
    // protected $fillable = ['name', 'surname', 'email', 'password', 'patronymic', 'age', 'gender', 'address'];
    // protected $guarded = false;

    static function getGenders(){
        return [
            self::GENDER_MALE => 'Male',
            self::GENDER_FEMALE => 'Female',
        ];
    }
    // public function getGenderTitleAttributes(){
    //     return self::getGenders()[$this->gender];
    // }
    public function getGenderTitleAttribute()
    {
        return self::getGenders()[$this->gender];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'surname',
        'patronymic',
        'address',
        'age',
        'gender',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];
}
