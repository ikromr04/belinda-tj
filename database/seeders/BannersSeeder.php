<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    foreach (range(1, 3) as $key) {
      Banner::create([
        'img' => 'banner.jpg',
        'link' => 'Купить',
        'url' => '#',
      ]);
    }
  }
}
