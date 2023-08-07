<?php

namespace Database\Seeders;

use App\Models\Classification;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $classifications = array(
      array(
        'id' => 1,
        'title' => 'Аминокислоты',
      ),
      array(
        'id' => 2,
        'title' => 'Антианемические препараты',
      ),
      array(
        'id' => 3,
        'title' => 'Антигистаминные препараты',
      ),
      array(
        'id' => 4,
        'title' => 'Антидиабетические препараты',
      ),
      array(
        'id' => 5,
        'title' => 'Венотонизирующие препараты',
      ),
      array(
        'id' => 6,
        'title' => 'Витамины и минералы',
      ),
      array(
        'id' => 7,
        'title' => 'Гинекологические препараты',
      ),
      array(
        'id' => 8,
        'title' => 'Глазные препараты',
      ),
      array(
        'id' => 9,
        'title' => 'Гормональные препараты',
      ),
    );

    foreach ($classifications as $classification) {
      $table = new Classification();
      $table->title = $classification['title'];
      $table->slug = SlugService::createSlug(Classification::class, 'slug', $table->title);
      $table->save();
    }
  }
}
