<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VacancySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create('ru_RU');

    foreach (range(1, 5) as $key) {
      Vacancy::create([
        'title' => 'Вакансия - ' . $key,
        'description' => 'Опыт успешных фармацевтических продаж от 1 года 0,00), тимолола малеата 6.83 мг (эквивалентно тимололу 5,00 мг) вспомогательные вещества: маннитол, натрия цитрат, гидроксиэтилцеллюлоза (натрозол НХ 250), натрия гидроксида 1 М раствор до рН 5,65, бензалкония хлорид 50 % раствор, натрия гидроксида 1 М раствор до рН 5,5-5,8, вода для инъекций.'
      ]);
    }
  }
}
