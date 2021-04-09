<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

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

    function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    //    function checkRole($roleId) {
//        foreach ($this->roles as $role) {
//            if ($roleId == $role->id) {
//                return true;
//            }
//        }
//
//        return false;
//    }
    function checkRole($roleId) {
        return $this->roles->contains($roleId);
    }

    function checkAccess(){
        $roles = auth()->user()->roles;

        foreach ($roles as $role){
            $role_user = $role->id;
            if ($role_user == 1){//Admin
                return true;
            }elseif ($role_user == 2){//User
                return true;
            }elseif ($role_user == 3){//Dev
                return true;
            }else{//Null
                return true;
            }
        }

    }

    function checkAccessUser(){
        $roles = auth()->user()->roles;

        foreach ($roles as $role){
            $role_user = $role->id;
            if ($role_user == 1){//Admin
                return true;
            }elseif ($role_user == 2){//User
                return true;
            }elseif ($role_user == 3){//Dev
                return true;
            }else{//Null
                return false;
            }
        }

    }

    function checkAccessDev(){
        $roles = auth()->user()->roles;

        foreach ($roles as $role){
            $role_user = $role->id;
            if ($role_user == 1){//Admin
                return true;
            }elseif ($role_user == 2){//User
                return false;
            }elseif ($role_user == 3){//Dev
                return true;
            }else{//Null
                return false;
            }
        }

    }

    function checkAccessAdmin(){
        $roles = auth()->user()->roles;

        foreach ($roles as $role){
            $role_user = $role->id;
            if ($role_user == 1){//Admin
                return true;
            }elseif ($role_user == 2){//User
                return false;
            }elseif ($role_user == 3){//Dev
                return false;
            }else{//Null
                return false;
            }
        }

    }
}
