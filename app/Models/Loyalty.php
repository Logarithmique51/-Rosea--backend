<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property string $uuid
 * @property int $balance
 * @property int $user_id
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Loyalty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loyalty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loyalty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Loyalty whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loyalty whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loyalty whereUuid($value)
 * @property string $id
 * @method static \Illuminate\Database\Eloquent\Builder|Loyalty whereId($value)
 * @mixin \Eloquent
 */
class Loyalty extends Model
{
    use HasFactory;
    use HasUuids;

    public $timestamps = false;

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function add_balance($amount){
        $this->balance += $amount;
        $this->save();
    }

    public function remove_balance($amount){
        if($this->balance <= $amount) {
            $this->balance = 0;
        }else{
            $this->balance -= $amount;
        }
        $this->save();
    }
}
