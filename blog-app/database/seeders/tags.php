<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'sport',
        ]);

        DB::table('tags')->insert([
            'name' => 'economy',
        ]);

        DB::table('tags')->insert([
            'name' => 'health',
        ]);

        DB::table('tags')->insert([
            'name' => 'top',
        ]);

        DB::table('tags')->insert([
            'name' => 'foreign',
        ]);

        DB::table('tags')->insert([
            'name' => 'domestic',
        ]);

        DB::table('tags')->insert([
            'name' => 'tech',
        ]);

        DB::table('tags')->insert([
            'name' => 'cult',
        ]);
    }
}
