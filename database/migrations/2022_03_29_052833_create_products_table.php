<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('slug')->unique();
      $table->string('photo')->nullable();
      $table->string('instruction')->nullable();
      $table->integer('classification_id')->nullable();
      $table->integer('nosology_id')->nullable();
      $table->integer('release_form_id')->nullable();
      $table->string('prescription')->nullable();
      $table->text('description')->nullable();
      $table->text('composition')->nullable();
      $table->text('indications')->nullable();
      $table->text('mode')->nullable();
      $table->text('url')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('products');
  }
}
