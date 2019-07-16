<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert(['name' => 'Brazil']);
        DB::table('countries')->insert(['name' => 'Israel']);
        DB::table('countries')->insert(['name' => 'Italy']);
        DB::table('countries')->insert(['name' => 'United Kingdom']);
        DB::table('countries')->insert(['name' => 'United States']);
    }
}
