<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject; // A ajouter
class User extends Authenticatable implements JWTSubject // A ajouter
{
    use HasFactory, Notifiable; // A modifier
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed', // A commenter ou supprimer
    ];
    // A ajouter
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function books()
    {
        return $this->hasMany(Book::class, 'id');
    }

    public function vinyls()
    {
        return $this->hasMany(Vinyl::class, 'id');
    }
}
