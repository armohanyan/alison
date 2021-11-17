<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name' ,
        'surname',
        'email',
        'password',
        'google_id',
        'facebook_id',
        'linkedin_id',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table = 'users';

    public function chats(){
       return $this->hasMany(Chat::class);
    }

    public function hasRateUser($course){
        return (bool) $course->ratings
            ->where( 'user_id', $this->id )
            ->count();
    }

    public function getUserFullName(){
        return $this->first_name. ' '. $this->surname ;
    }

    public function getUserAvatar(){
        return 'https://static.thenounproject.com/png/363640-200.png';
    }

    //    public function getParticipantMessages($participan_id){
    //        $messages = Chat::where('user_id', )
    //
    //    }
}
