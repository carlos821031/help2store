<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'code',
        'stock',
        'image',
        'quantity_min',
        'quantity_max',
        'sales',
        'price',
    ];
    
    /**relacion  M to M*/
    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class, 'location_product')
            ->withPivot('quantity', 'description')
            ->withTimestamps();
    }

    /**Relacion de 1 to M */
    public function movements(): HasMany
    {
        return $this->hasMany(Movement::class);
    }
}
