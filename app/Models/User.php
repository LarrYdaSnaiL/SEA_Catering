<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Subscription;
use App\Models\Testimonial;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
        'is_admin',
    ];
    protected $hidden = ['password', 'remember_token'];
    protected function casts(): array
    {
        return ['email_verified_at' => 'datetime', 'password' => 'hashed'];
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
