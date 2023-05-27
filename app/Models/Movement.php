<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TypeMovementEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_mov', 'type_mov', 'product_id', 'origen', 'destiny', 'deliver', 'receiver', 'quantity_mov', 'user_id', 'quantity_initial_total', 'quantity_initial_origin', 'quantity_initial_destiny', 'price', 'stock_total', 'stock_origin', 'stock_destiny', 'sales', 'description'
    ]; 

    protected $casts = [
        'type_mov' => TypeMovementEnum::class
    ];

    /** Relacion de M - 1 */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }    

    /** Relacion de M - 1 */
    public function origin(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'id', 'origin');
    }

    /** Relacion de M - 1 */
    public function destiny(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'id', 'destiny');
    }

    /** Relacion de M - 1 */
    public function deliver(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'id', 'deliver');
    }

    /** Relacion de M - 1 */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'id', 'receiver');
    }

    /** Relacion de M - 1 */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
