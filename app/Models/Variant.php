<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VariantOption> $options
 * @property-read int|null $options_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @mixin \Eloquent
 */
class Variant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function options(){
        return $this->hasMany(VariantOption::class);
    }
}
