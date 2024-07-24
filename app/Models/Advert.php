<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'advert_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'advert_id',
        'advert_name',
        'img',
        'selling_price',
        'advert_description',
    ];

    public function books()
    {
        return $this->belongsTo(Book::class, 'advert_id');
    }
}
