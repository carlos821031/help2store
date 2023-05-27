<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'description',
        'code',
        'latitude',
        'longitude',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('date_mov', 'quantity', 'description')
            ->withTimestamps();
    }

    /**Relacion de 1 to M identifdicar cuando es origen o destino*/
    public function movements_origin(): HasMany
    {
        return $this->hasMany(Movement::class, 'origin');
    }

    /**Relacion de 1 to M identifdicar cuando es origen o destino*/
    public function movements_destiny(): HasMany
    {
        return $this->hasMany(Movement::class, 'destiny');
    }
}
