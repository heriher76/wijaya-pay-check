<?php

use Illuminate\Database\Seeder;
use app\Laporan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // factory(Laporan::class, 20)->create();
    }
}
