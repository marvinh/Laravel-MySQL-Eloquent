<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed using firstOrCreate()
     
        with(new \App\User)->seed();
        with(new \App\Role)->seed();
        with(new \App\UserRoles)->seed();
        with(new \App\Restaurant)->seed();
        with(new \App\Review)->seed();
        with(new \App\Day)->seed();
        with(new \App\OperatingHour)->seed();
        with(new \App\Menu)->seed();
    }
}
