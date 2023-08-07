<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory, SoftDeletes, Sluggable;

  protected $guarded = [];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  public function nosology()
  {
    return $this->belongsTo(Nosology::class, 'nosology_id');
  }

  public function classification()
  {
    return $this->belongsTo(Classification::class, 'classification_id');
  }

  public function releaseForm()
  {
    return $this->belongsTo(ReleaseForm::class, 'release_form_id');
  }
}
