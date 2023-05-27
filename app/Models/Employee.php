<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;    

    /**Relacion de 1 to M */
    public function movements_deliver(): HasMany
    {        
        return $this->hasMany(Movement::class, 'deliver');
    }

    /**Relacion de 1 to M */
    public function movements_receiver(): HasMany
    {        
        return $this->hasMany(Movement::class, 'receiver');
    }
}
