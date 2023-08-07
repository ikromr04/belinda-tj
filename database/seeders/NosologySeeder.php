<?php

namespace Database\Seeders;

use App\Models\Nosology;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;

class NosologySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $nosologies = array(
      array(
        'id' => 1,
        'title' => 'Алгология',
      ),
      array(
        'id' => 2,
        'title' => 'Аллергология',
      ),
      array(
        'id' => 3,
        'title' => 'Гематология',
      ),
      array(
        'id' => 4,
        'title' => 'Гинекология',
      ),
      array(
        'id' => 5,
        'title' => 'Дерматология',
      ),
      array(
        'id' => 6,
        'title' => 'Иммунология',
      ),
      array(
        'id' => 7,
        'title' => 'Кардиология',
      ),
      array(
        'id' => 8,
        'title' => 'Микробиология',
      ),
      array(
        'id' => 9,
        'title' => 'Нейрология',
      ),
    );
    foreach ($nosologies as $nosology) {
      $table = new Nosology();
      $table->title = $nosology['title'];
      $table->slug = SlugService::createSlug(Nosology::class, 'slug', $table->title);
      $table->save();
    }
  }
}
