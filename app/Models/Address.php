<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * 
 *
 * @property int $id
 * @property string $number
 * @property string $street
 * @property string $postcode
 * @property string $name
 * @property string $city
 * @property string $label
 * @property float $latitude
 * @property float $longitude
 * @method static \Illuminate\Database\Eloquent\Builder|address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|address query()
 * @method static \Illuminate\Database\Eloquent\Builder|address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereStreet($value)
 * @property int $addresseable_id
 * @property string $addresseable_type
 * @property-read Model|\Eloquent $addresseable
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddresseableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddresseableType($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;

    public function addresseable(): MorphTo
    {
        return $this->morphTo();
    }

}
