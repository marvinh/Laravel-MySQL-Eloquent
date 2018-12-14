<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    protected $table = "restaurants";
    
    protected $fillable = [
        'name', 'street_address', 'city', 'state', 'website'
    ];


    public function reviews()
    {
        return $this->hasMany('App\Review','restaurant_id','id');
    }

    public function menu()
    {
        return $this->hasMany('App\Menu','restaurant_id','id');
    }

    public function hours()
    {
        return $this->hasMany('App\OperatingHour','restaurant_id','id');
    }

    public function seed(){

        Restaurant::firstOrCreate([
            "name" => "In-N-Out",
            "street_address" =>  "6225 Foothill Blvd.",
            "city" => "Tujunga",
            "state" => "CA",
            "website" => "http://www.in-n-out.com/"
        ]);

         Restaurant::firstOrCreate([
            "name" => "the Habit Burger Grill",
            "street_address" =>  "990 Town Center Dr.",
            "city" => "La Canada-Flintridge",
            "state" => "CA",
            "website" => "https://www.habitburger.com/"
        ]);
    }
}