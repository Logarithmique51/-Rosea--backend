<?php

namespace App\Models\Carts;

use App\Models\Products\Variant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $price
 * @property int $cart_product_id
 * @property int $variant_id
 * @property-read \App\Models\Carts\CartProduct $cart_product
 * @property-read Variant $variant
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductVariant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductVariant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductVariant query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductVariant whereCartProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductVariant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductVariant wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductVariant whereVariantId($value)
 * @mixin \Eloquent
 */
class CartProductVariant extends Model
{
    use HasFactory;
    protected $fillable = ['price','variant_id','cart_product_id'];

    public function variant(): BelongsTo
    {
        return $this->belongsTo(Variant::class);
    }

    public function cart_product(): BelongsTo
    {
        return $this->belongsTo(CartProduct::class);
    }

}
