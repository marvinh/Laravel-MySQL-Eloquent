<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    //
    public function seed()
    {
        Day::firstOrCreate(["day"=>"Sunday"]);
        Day::firstOrCreate(["day"=>"Monday"]);
        Day::firstOrCreate(["day"=>"Tuesday"]);
        Day::firstOrCreate(["day"=>"Wednesday"]);
        Day::firstOrCreate(["day"=>"Thursday"]);
        Day::firstOrCreate(["day"=>"Friday"]);
        Day::firstOrCreate(["day"=>"Saturday"]);
    }
}
