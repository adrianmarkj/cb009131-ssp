<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;

class Event extends Model implements HasMedia, CanVisit
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasVisits;

    //setting default values for the variables in fillabke
    protected $attributes = [
        'sort_order' => 0,
        'status'=> 1,
    ];

    protected $fillable = [
        'category_id',
        'name',
        'url',
        'description',
        'address',
        'start_date',
        'end_date',
        'price_per_person',
        'phone',
        'email',
        'sort_order',
        'status',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
}
