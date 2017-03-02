<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use GrahamCampbell\Markdown\Facades\Markdown;

class User extends Authenticatable
{
    public function posts()
    {
      return $this->hasMany(Post::class, 'author_id');
    }

    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function getAuthorBioAttribute($value)
    {
      return $this->bio ? Markdown::convertToHtml(e($this->bio)) : NULL;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
