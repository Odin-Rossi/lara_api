<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Product;
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
        // $this->call();
        // \App\Models\User::factory(10)->create();
        Product::factory(50)->create();
        Review::factory(300)->create();

        // // \factory(ProductFactory::class, 50)->create();
        // \factory(ReviewFactory::class, 50)->create();

    }
}
