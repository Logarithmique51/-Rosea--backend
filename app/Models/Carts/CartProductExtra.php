<?php

namespace App\Models\Carts;

use App\Models\Products\Extra;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $price
 * @property int $extra_id
 * @property int $cart_product_id
 * @property-read \App\Models\Carts\CartProduct $cart_product
 * @property-read Extra $extra
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductExtra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductExtra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductExtra query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductExtra whereCartProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductExtra whereExtraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductExtra whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductExtra wherePrice($value)
 * @mixin \Eloquent
 */
class CartProductExtra extends Model
{
    use HasFactory;
    protected $fillable = ['price','extra_id','cart_product_id'];

    public function extra() : BelongsTo
    {
        return $this->belongsTo(Extra::class);
    }

    public function cart_product(): BelongsTo
    {
        return $this->belongsTo(CartProduct::class);
    }
}
