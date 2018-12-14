<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
     protected $fillable = [
        'name', 'restaurant_id', 'desc', 'price'
    ];

    public function seed()
    {
        Menu::firstOrCreate([
                "restaurant_id" => 1,
                "name" => "cheese burger",
                "desc" => "burger with cheese!",
                "price" => 5.00,
            ]);
        Menu::firstOrCreate([
                "restaurant_id" => 1,
                "name" => "animal style fries",
                "desc" => "french fries with cheese and spread!",
                "price" => 2.00,
            ]);

        Menu::firstOrCreate([
                "restaurant_id" => 2,
                "name" => "charred burger",
                "desc" => "char grilled burger!",
                "price" => 5.00,
            ]);
        Menu::firstOrCreate([
                "restaurant_id" => 2,
                "name" => "crispy fries",
                "desc" => "best fries in town!",
                "price" => 2.00,
            ]);
    }
}
