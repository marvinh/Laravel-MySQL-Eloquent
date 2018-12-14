<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $table = "roles";
    
    public function seed(){

        Role::firstOrCreate([
            "name" => "admin",
        ]);

         Role::firstOrCreate([
            "name" => "reviewer",
        ]);
    }
}
