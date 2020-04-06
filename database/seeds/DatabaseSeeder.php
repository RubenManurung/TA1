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
        $this->call(adakregistrasiTableSeeder::class);
        $this->call(penilaianTableSeeder::class); 
        $this->call(DimxdimTableSeeder::class);
    }
}
