<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    //setting default values for the variables in fillabke
    protected $attributes = [
        'sort_order' => 0,
        'status'=> 1,
    ];

    protected $fillable = [
        'title',
        'url',
        'summary',
        'content',
        'sort_order',
        'status',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];
}
