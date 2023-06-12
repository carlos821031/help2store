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
        'date_mov', 'type_mov', 'product_id', 'location_id', 'employee_id', 'quantity_mov', 'user_id', 'stock_total', 'stock_location', 'price', 'price_total_mov', 'sales', 'sales_total_mov', 'profits_total_mov', 'description'
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
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /** Relacion de M - 1 */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /** Relacion de M - 1 */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**Lista de productos con existencias */
    /*
    static function products_with_stock()
    {
        $products = Product::all();
        $products_with_stock_tmp = [];

        foreach ($products as $product) {
            $last_movimient = Movement::where('product_id', $product->id)                
                ->first();

            if ($last_movimient) {
                $products_with_stock_tmp[] = $product->get();
            }
        }
        return $products_with_stock_tmp;
    }
    */
}
