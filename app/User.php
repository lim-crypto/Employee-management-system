<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'firstName', 'middleName', 'lastName', 'dob', 'gender', 'avatar', 'position_id', 'department_id',
        'civilStatus', 'phoneNumber', 'houseNumber', 'street', 'brgy', 'city', 'province', 'country', 'school', 'course', 'certificate','skill',
        'ename', 'ephone', 'relationship', 'eFullAddress' , 'dateHired'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function adminlte_image()
    {   
        if(auth()->user()->avatar){
            return '/storage/images/' . auth()->user()->avatar;
        }else{
            return '/storage/images/user.png';
        }
      
    }
    public function adminlte_name()
    {
        return  auth()->user()->firstName . ' ' . auth()->user()->lastName;
    }
    public function adminlte_desc()
    {
        $position = Position::where('id', auth()->user()->position_id)->get();
        return  $position[0]->name;
    }
    public function adminlte_profile_url()
    {
        return route('users.show', auth()->user()->id);
    }
    public static function userid()
    {
        return  auth()->user()->id;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function leave()
    {
        return $this->hasMany(Leave::class);
    }
}
