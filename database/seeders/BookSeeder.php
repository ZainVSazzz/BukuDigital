<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sd = Category::query()->where('name', 'SD')->first();
        $smp = Category::query()->where('name', 'SMP')->first();
        $sma = Category::query()->where('name', 'SMA')->first();

        Book::factory(7)->for($sd)->create();
        Book::factory(7)->for($smp)->create();
        Book::factory(7)->for($sma)->create();
    }
}
