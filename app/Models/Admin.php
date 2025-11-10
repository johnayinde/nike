<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Add this accessor to combine firstname and lastname
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => trim("{$this->firstname} {$this->lastname}"),
        );
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true; // Add your authorization logic here
    }

    // Optional: Add this method for Filament to use
    public function getFilamentName(): string
    {
        return $this->name;
    }
}