<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'title',
        'author',
        'description',
        'edition',
        'purchase_price',
        'is_for_sale',
        'user_id',
        'advert_id',
    ];

    protected $casts = [
        'is_for_sale' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function advert()
    {
        return $this->hasMany(Advert::class, 'advert_id');
    }
}
