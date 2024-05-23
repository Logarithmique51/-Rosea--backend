<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property-read \App\Models\Address|null $address
 * @method static \Illuminate\Database\Eloquent\Builder|Place newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Place newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Place query()
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereName($value)
 * @mixin \Eloquent
 */
class Place extends Model
{
    use HasFactory;

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class,'addresseable');
    }
}
