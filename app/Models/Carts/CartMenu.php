<?php

namespace App\Models\Carts;

use App\Models\Menus\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $id
 * @property string $comment
 * @property int $price
 * @property int $menu_id
 * @property int $cart_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Item> $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenu whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenu whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenu whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartMenu wherePrice($value)
 * @mixin \Eloquent
 */
class CartMenu extends Model
{
    use HasFactory;
    protected $fillable = ['price','comment','menu_id','cart_id'];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
}
