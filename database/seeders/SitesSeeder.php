<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SitesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $sites = array(
      array(
        'id' => 1,
        'title' => 'Великобритания',
        'site' => 'belinda.uk.com',
        'url' => 'https://belinda.uk.com',
      ),
      array(
        'id' => 2,
        'title' => 'Казахстан',
        'site' => 'belinda.kz',
        'url' => 'https://belinda.kz',
      ),
      array(
        'id' => 3,
        'title' => 'Индия',
        'site' => 'belinda.in',
        'url' => 'https://belinda.in',
      ),
      array(
        'id' => 4,
        'title' => 'Таджикистан',
        'site' => 'belinda.tj',
        'url' => 'https://belinda.tj',
      ),
      array(
        'id' => 5,
        'title' => 'Кыргызстан',
        'site' => 'belinda.kg',
        'url' => 'https://belinda.kg',
      ),
      array(
        'id' => 6,
        'title' => 'Афганистан',
        'site' => 'belinda.af',
        'url' => 'https://belinda.af',
      ),
    );

    foreach ($sites as $site) {
      $table = new Site();
      $table->title = $site['title'];
      $table->site = $site['site'];
      $table->url = $site['url'];
      $table->save();
    }
  }
}
