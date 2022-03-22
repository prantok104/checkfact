<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Rumor extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'sender_name', 'sender_email', 'sender_phone', 'rumor_title'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('rumor')
            ->width(255)
            ->height(170);
    }
}
