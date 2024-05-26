<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @method static \Illuminate\Database\Eloquent\Builder|Extra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra query()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra wherePrice($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products\VariantOption> $options
 * @property-read int|null $options_count
 * @mixin \Eloquent
 */
class Extra extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','price'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function options(){
       return $this->belongsToMany(VariantOption::class)->withPivot('price');
    }
}
