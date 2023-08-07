<?php

namespace Database\Seeders;

use App\Models\Text;
use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $texts = array(
      array('id' => '1', 'slug' => 'about-advantages-title', 'page' => 'about', 'text' => 'НАШИ ПРЕИМУЩЕСТВА', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '1', 'slug' => 'about-values-title', 'page' => 'about', 'text' => 'НАШИ ПРЕИМУЩЕСТВА', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '2', 'slug' => 'about-advantage-1', 'page' => 'about', 'text' => 'ЭФФЕКТИВНОСТЬ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '3', 'slug' => 'about-advantage-2', 'page' => 'about', 'text' => 'ИННОВАЦИИ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '4', 'slug' => 'about-advantage-3', 'page' => 'about', 'text' => 'ПРЕДСТАВЛЕНИЕ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '5', 'slug' => 'about-advantage-4', 'page' => 'about', 'text' => 'СОТРУДНИЧЕСТВО', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '6', 'slug' => 'about-advantage-5', 'page' => 'about', 'text' => 'РАБОТА В КОМАНДЕ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '7', 'slug' => 'about-advantage-6', 'page' => 'about', 'text' => 'КОМПЕТЕНТНОСТЬ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '8', 'slug' => 'about-mission-vision-title', 'page' => 'about', 'text' => 'НАША МИССИЯ И ВИДЕНИЕ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '9', 'slug' => 'about-global-presence-title', 'page' => 'about', 'text' => 'ГЛОБАЛЬНОЕ ПРИСУТСТВИЕ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '10', 'slug' => 'products-title', 'page' => 'products', 'text' => 'ВСЕ ПРОДУКТЫ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '11', 'slug' => 'products-similar-title', 'page' => 'products', 'text' => 'ПОХОЖИЕ ПРОДУКТЫ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '12', 'slug' => 'products-popular-title', 'page' => 'products', 'text' => 'ПОПУЛЯРНЫЕ ПРОДУКТЫ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '13', 'slug' => 'carrier-vacancies-title', 'page' => 'carrier', 'text' => 'ТЕКУЩИЕ ВАКАНСИИ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '14', 'slug' => 'newslifestyle-title', 'page' => 'newslifestyle', 'text' => 'Новости и образ жизни', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL),
      array('id' => '15', 'slug' => 'contacts-global-presence', 'page' => 'contacts', 'text' => 'ГЛОБАЛЬНОЕ ПРИСУТСТВИЕ', 'created_at' => '2022-09-16 11:40:04', 'updated_at' => '2022-09-16 11:40:04', 'deleted_at' => NULL)
    );

    foreach ($texts as $text) {
      Text::create([
        'slug' => $text['slug'],
        'page' => $text['page'],
        'text' => $text['text'],
      ]);
    }
  }
}
