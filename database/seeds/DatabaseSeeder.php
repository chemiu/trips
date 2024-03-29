<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

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
        Eloquent::unguard();
        $this->call('UsersTableSeeder');
        $this->call('CountriesTableSeeder');
    }
}
