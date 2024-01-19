<?php

namespace Database\Seeders;

use App\Models\Features;
use App\Models\Meaning;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MeaningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();


        foreach (Product::all() as $value)
        {
            for ($i=0; $i<rand(1,10); $i++)
            {
                Meaning::query()->firstOrCreate(
                    [
                        'feature_id' => Features::query()->inRandomOrder()->limit(1)->value('id'),
                        'product_id' => $value->id,
                    ],
                    [
                        'property' => $faker->randomLetter
                ]

                );
        }

        }
    }
}
