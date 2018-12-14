<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role','role_id','id');
    }

    
    public function hasRole($roleName) {
        foreach($this->role()->get() as $role)
        {
            if($role->name == $roleName)
            {
                return true;
            }
        }
        return false;
   }


    public function seed(){

        User::firstOrCreate([
            "name" => "Admin",
            "email" => "admin@example.com",
            "password" => bcrypt("admin"),
            "role_id" => 1,
            ]);

         User::firstOrCreate([
            "name" => "Reviewer",
            "email" => "reviewer@example.com",
            "password" => bcrypt("reviewer"),
            "role_id" => 2,
        ]);
    }
   
}
