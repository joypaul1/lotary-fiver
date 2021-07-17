<?php

use App\Models\Footer;
use Illuminate\Database\Seeder;

class FooterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Footer::create(['description' => 'Follow us and pledge your fealty:']);
    }
}
