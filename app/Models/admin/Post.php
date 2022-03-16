<?php

namespace App\Models\admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, Sluggable, InteractsWithMedia;
    protected $table = 'posts';
    protected $dates = ['deleted_at'];
    protected $hidden = ['pivot'];

    public function sluggable(): array
    {
        return [
            'slug_en' => [
                'source' => 'title_en'
            ],
            'slug_bn'  => [
                'source'    => 'title_bn'
            ]
        ];
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(255)
            ->height(170);
    }

    public function categories(){
        return $this->hasMany(Category::class, 'id', 'category_id');
    }
}
