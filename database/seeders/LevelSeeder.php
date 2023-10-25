<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('levels')->insert([
            ['name' => 'الصف الأول الثانوي',
            'one_price' => 50],
            ['name' => 'الصف الثاني الثانوي',
            'one_price' => 50],
            ['name' => 'الصف الثالث الثانوي',
            'one_price' => 50],
        ]);
    }
}