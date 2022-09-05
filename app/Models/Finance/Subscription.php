<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory;

    protected $attributes = [
        'status'=> 1,
    ];

    protected $fillable = [
        'status',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];
}
