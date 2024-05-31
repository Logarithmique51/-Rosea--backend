<?php

namespace App\Models\Carts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 *
 *
 * @property int $id
 * @property string $comment
 * @property int $sub_total
 * @property int $total
 * @property int $place_id
 * @property int $cartable_id
 * @property string $cartable_type
 * @property string $type
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCartableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCartableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePlaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereType($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['comment','sub_total','total','type'];

    public function cartable(): MorphTo
    {
        return $this->morphTo();
    }

}
