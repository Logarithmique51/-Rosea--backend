<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string|null $hide_name
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereHideName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereTitle($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products\VariantOption> $options
 * @property-read int|null $options_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products\Product> $products
 * @property-read int|null $products_count
 * @mixin \Eloquent
 */
class Variant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title','hide_name'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function options(){
       return $this->hasMany(VariantOption::class);
    }
}
