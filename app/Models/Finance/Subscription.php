<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\User;
use App\Models\Event;

class Subscription extends Model
{
    use HasFactory;

    protected $attributes = [
        'status'=> 1,
    ];

    protected $fillable = [
        'event_id',
        'user_id',
        'number_of_people',
        'total_price',
        'status',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];
}
