<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ApplicationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();

    foreach (range(1, 33) as $key) {
      Application::create([
        'vacancy_id' => $faker->numberBetween($min = 1, $max = 5),
        'name' => $faker->realText($maxNbChars = 12),
        'email' => 'email@gmail.com',
        'phone' => '987654321',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eaque placeat voluptatum',
      ]);
    }
  }
}
