<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Web Development',
                'url' => Str::slug('Web Development'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile Development',
                'url' => Str::slug('Mobile Development'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Data Science',
                'url' => Str::slug('Data Science'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
