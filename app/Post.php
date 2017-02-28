<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author()
    {
      return $this->belongsTo(User::class);
    }
    public function getImageUrlAttribute($value)
    {
      $imageUrl = "";
      if (! is_null($this->image) )
      {
        $imageUrl = public_path() . "/img/" . $this->image;
        if ( file_exists($imageUrl) ) $imageUrl = asset('img/' . $this->image);
      }

      return $imageUrl;
    }
}
