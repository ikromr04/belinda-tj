<?php

/**
 * Custom helper class
 * @author Ikrom Rahimov fleck97rgb@gmail.com
 */

namespace App\Helpers;

use App\Models\Button;
use App\Models\Content;
use App\Models\Text;
use stdClass;

class Helper
{
  public static function getContents($pageName)
  {
    $response = [];
    $contents = Content::where('page', $pageName)
      ->orWhere('page', null)
      ->get();

    foreach ($contents as $content) {
      $response[$content->slug] = $content->content;
    }

    $texts = Text::where('page', $pageName)
      ->orWhere('page', null)
      ->get();

    foreach ($texts as $text) {
      $response[$text->slug] = $text->text;
    }

    return $response;
  }

  public static function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80)
  {
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];

    switch ($mime) {
      case 'image/gif':
        $image_create = "imagecreatefromgif";
        $image = "imagegif";
        break;

      case 'image/png':
        $image_create = "imagecreatefrompng";
        $image = "imagepng";
        $quality = 7;
        break;

      case 'image/jpeg':
        $image_create = "imagecreatefromjpeg";
        $image = "imagejpeg";
        $quality = 80;
        break;

      default:
        return false;
        break;
    }

    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);

    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
    if ($width_new > $width) {
      //cut point by height
      $h_point = (($height - $height_new) / 2);
      //copy image
      imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    } else {
      //cut point by width
      $w_point = (($width - $width_new) / 2);
      imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }

    $image($dst_img, $dst_dir, $quality);

    if ($dst_img) imagedestroy($dst_img);
    if ($src_img) imagedestroy($src_img);
  }
}
