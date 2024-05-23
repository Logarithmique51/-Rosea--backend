<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $variant_id
 * @property int $value
 * @property int|null $price
 * @property-read \App\Models\Variant $variant
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption whereVariantId($value)
 * @mixin \Eloquent
 */
class VariantOption extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['value','price','variant_id'];

    public function variant(){
        return $this->belongsTo(Variant::class);
    }
}
