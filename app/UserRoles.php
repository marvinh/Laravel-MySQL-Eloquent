<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{

    protected $table = "user_roles";

    public function seed(){

        UserRoles::firstOrCreate([
            "user_id" => 1,
            "role_id" => 1,
        ]);

         UserRoles::firstOrCreate([
            "user_id" => 2,
            "role_id" => 2,
        ]);
    }
}
