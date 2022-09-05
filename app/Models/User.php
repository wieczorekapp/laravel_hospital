<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','status','pesel','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//okreslenie relacji ze strony jeden - wielu(jeden lekarz moze miec wiele wizyt)
    public function doctorVisits(){
        return $this->hasMany(Visit::class,'doctor_id');
    }

    public function patientVisits(){
        return $this->hasMany(Visit::class,'patient_id');
    }
//okreslenie relacji wiele do wielu, z wykorzystanie tabeli specialization_users jako pivot
    public function specializations(){
        return $this->belongsToMany(Specialization::class,'specialization_users');
    }
}
