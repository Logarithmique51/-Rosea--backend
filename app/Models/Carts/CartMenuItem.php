<?php

namespace App\Models\Carts;

use App\Models\Menus\Item;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $cart_menu_id
 * @property int $item_id
 * @property int $product_id
 * @property-read \App\Models\Carts\CartMenu $cart_menu
 * @property-read Item $item
 * @property-read Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenuItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenuItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenuItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenuItem whereCartMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenuItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenuItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenuItem whereProductId($value)
 * @mixin \Eloquent
 */
class CartMenuItem extends Model
{
    use HasFactory;
    protected $fillable = ['cart_menu_id','item_id','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function cart_menu(){
        return $this->belongsTo(CartMenu::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

}
