<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use function Symfony\Component\Translation\t;

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
            CategorySeeder::class,
            FeatureSeeder::class,
            ProductSeeder::class,
            MeaningSeeder::class
        ]);

        // User::factory(10)->create();
    }
}
