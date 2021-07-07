<?php

use App\Models\Name;
use Illuminate\Database\Seeder;

class NameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Name::create([
            'id'=>1,
            'name'=>"section one",
        ]);
        Name::create([
            'id'=>2,
            'name'=>"section two",
        ]);
        Name::create([
            'id'=>3,
            'name'=>"section three",
        ]);
        Name::create([
            'id'=>4,
            'name'=>"section four",
        ]);
    }
}
