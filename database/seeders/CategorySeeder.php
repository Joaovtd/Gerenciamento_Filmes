<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table("categories")->insert([
            ["name" => "Romance"],
            ["name" => "Terror"],
            ["name" => "Suspense"],
            ["name" => "Comédia"],
            ["name" => "Drama"],
            ["name" => "Ação"],
            ["name" => "Aventura"],
        ]);
    }
}
