<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    protected $fillable = ['title', 'slub', 'except', 'body', 'published_at', 'category_id'];
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

    public function getImageThumbUrlAttribute($value)
    {
      $imageUrl = "";
      if (! is_null($this->image) )
      {
        $thumbnail = str_replace('.jpg', '_thumb.jpg', $this->image);

        $imageUrl = public_path() . "/img/" . $thumbnail;
        if ( file_exists($imageUrl) ) $imageUrl = asset('img/' . $thumbnail);
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

    public function scopePopular($query)
    {
       return $query->orderBy('view_count', 'desc');
    }

    public function scopePublished($query)
    {
      return $query->where('published_at', '<=', Carbon::now());
    }

    public function dateFormatted($showTimes = false)
    {
      $format = 'd/m/Y';
      if ($showTimes) $format = $format. ' H:i:s';
      return is_null($this->created_at) ? '' : $this->created_at->format($format);
    }

    public function publictionLabel()
    {
      if (!$this->published_at) {
        return '<span class="label label-warning">Draft</span>';
      }
      elseif ($this->published_at && $this->published_at->isFuture() ) {
        return '<span class="label label-info">Schedule</span>';
      }
      else {
        return '<span class="label label-success">Published</span>';
      }

    }

    /*public function getRouteKeyName()
    {
      return 'slub';
    }*/

}
