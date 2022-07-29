<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    //setting default values for the variables in fillabke
    protected $attributes = [
        'sort_order' => 0,
        'status'=> 1,
    ];

    protected $fillable = [
        'sort_order',
        'status',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];
}
