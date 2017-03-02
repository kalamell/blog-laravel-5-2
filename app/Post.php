<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function author()
    {
      return $this->belongsTo(User::class);
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
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

    public function getDateAttribute($value)
    {
      return $this->created_at->diffForHumans();
    }

    public function getDateFormatAttribute($value)
    {
      return $this->published_at->diffForHumans();
    }

    public function getBodyHtmlAttribute($value)
    {
      return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getExceptHtmlAttribute($value)
    {
      return $this->except ? Markdown::convertToHtml(e($this->except)) : NULL;
    }


    public function scopeLatestFirst($query)
    {
       return $query->orderBy('published_at', 'desc');

    }

    public function scopePublished($query)
    {
      return $query->where('published_at', '<=', Carbon::now());
    }

    /*public function getRouteKeyName()
    {
      return 'slub';
    }*/

}
