<?php

namespace App\Models;

use App\Casts\JsonCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\ListingFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'type',
        'description',
        'location',
        'salary',
        'company'
    ];

    protected $casts = [
        'id' => 'string',
        'company' => JsonCast::class
    ];
    
}
