<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    
    protected $fillable = ['review','tagline','rating','restaurant_id','user_id'];

    
    public function reviewer()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant','restaurant_id','id');
    }


    public function seed(){

        Review::firstOrCreate([
            "restaurant_id" => 1,
            "user_id" => 2,
            "tagline" => "My First Review",
            "review" => "Great place to eat highly recommend!",
            "rating" => 5,
            ]);
        Review::firstOrCreate([
            "restaurant_id" => 1,
            "user_id" => 2,
            "tagline" => "My Second Review",
            "review" => "Was back again. They forgot ketchup!",
            "rating" => 2,
            ]);

         Review::firstOrCreate([
            "restaurant_id" => 2,
            "user_id" => 2,
            "tagline" => "My First Review",
            "review" => "Great place to dine!",
            "rating" => 5,
        ]);
    }
}
