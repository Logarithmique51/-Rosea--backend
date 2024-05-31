<?php

namespace App\Models\Carts;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $price
 * @property int $product_id
 * @property int $cart_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Carts\Cart> $cart
 * @property-read int|null $cart_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Product> $product
 * @property-read int|null $product_count
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereProductId($value)
 * @mixin \Eloquent
 */
class CartProduct extends Model
{
    use HasFactory;
    protected $fillable = ['price','product_id','cart_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

}
