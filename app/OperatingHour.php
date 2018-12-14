<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatingHour extends Model
{
    //

    protected $fillable = ['restaurant_id','day_id','opening','closing'];

    public function day()
    {
        return $this->belongsTo('App\Day','day_id','id');
    }

    public function seed(){

        for($i = 1; $i <= 7; $i++)
        {
            OperatingHour::firstOrCreate([
                "restaurant_id" => 1,
                "day_id" => $i,
                "opening" => 103000,
                "closing" => 10000,
            ]);
        }

         for($i = 1; $i <= 7; $i++)
        {
            OperatingHour::firstOrCreate([
                "restaurant_id" => 2,
                "day_id" => $i,
                "opening" => 103000,
                "closing" => 220000,
            ]);
        }

        
    }
}
