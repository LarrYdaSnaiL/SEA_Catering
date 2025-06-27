<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'plan_name',
        'plan_price',
        'meal_types',
        'delivery_days',
        'allergies',
        'status',
        'paused_from',
        'paused_to',
        'cancelled_at',
    ];

    protected $casts = [
        'meal_types' => 'array',
        'delivery_days' => 'array',
        'cancelled_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
