<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Album extends Model implements HasMedia
{
    use HasMediaTrait;
    use Sluggable;

    public $with = ['comments'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('small')
            ->width(1440)
            ->height(900);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'model');
    }
}
