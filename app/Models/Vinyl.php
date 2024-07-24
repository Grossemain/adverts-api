<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vinyl extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'album',
        'artist',
        'information',
        'label',
        'purchase_price',
        'is_for_sale',
        'advert_id',
        'user_id',
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
        return $this->belongsTo(Advert::class, 'advert_id');
    }
}
