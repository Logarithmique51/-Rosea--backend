<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $variant_id
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantOption whereVariantId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products\Extra> $extras
 * @property-read int|null $extras_count
 * @property-read \App\Models\Products\Variant $variant
 * @mixin \Eloquent
 */
class VariantOption extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','price'];

    public function variant(){
       return $this->belongsTo(Variant::class);
    }

    public function extras(){
       return $this->belongsToMany(Extra::class)->withPivot('price');
    }

}
