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
      // $this->call(UsersTableSeeder::class);
        factory('App\User',5)->create();
        factory('App\product',50)->create();
        factory('App\review',300)->create();
    }
}
