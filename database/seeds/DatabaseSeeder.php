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
        $this->call([
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
            SiteInfosTableSeeder::class,
            NameTableSeeder::class,
            FooterTableSeeder::class,
        ]);
    }
}
