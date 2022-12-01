<?php

use Illuminate\Database\Seeder;
use App\Models\Wood;
use Faker\Generator as Faker;

class WoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 5; $i++){
            $wood = new Wood;
            $wood->name = $faker->word();
            $wood->price = $faker->randomDigit();
            $wood->save();
        }
    }
}