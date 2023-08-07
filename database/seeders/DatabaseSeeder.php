<?php

namespace Database\Seeders;

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
    $this->call([
      UserSeeder::class,
      TextSeeder::class,
      ContentsSeeder::class,
      SitesSeeder::class,
      ProductsSeeder::class,
      ClassificationSeeder::class,
      NosologySeeder::class,
      ReleaseFormsSeeder::class,
      VacancySeeder::class,
      NewslifestyleSeeder::class,
      BannersSeeder::class,
    ]);
  }
}
