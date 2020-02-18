<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(['email'=>'brandonlee@gmail.com','name'=>'Brandon','password'=>bcrypt('123')]);
        \App\Product::create(['name'=>'Car','description'=>'1:18 Toy Car','price'=>'30.90']);
        \App\Product::create(['name'=>'Mini Van','description'=>'1:18  Van','price'=>'32.90']);
        \App\Product::create(['name'=>'Truck','description'=>'1:18  Truck','price'=>'35.90']);
    }
}
