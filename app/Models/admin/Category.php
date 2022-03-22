<?php

namespace App\Models\admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = 'categories';
    protected $dates = ['deleted_at'];

    // Create Slug
    public function sluggable(): array
    {
        return [
            'slug_en'  => [
                'source' => 'name_en'
            ],
            'slug_bn'  => [
                'source' => 'name_bn'
            ]
        ];
    }

    public function posts(){
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
