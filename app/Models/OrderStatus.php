<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderStatus
 *
 * @property int $id
 * @property string $status
 * @property string $estimatedTime
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereEstimatedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereStatus($value)
 * @mixin \Eloquent
 */
class OrderStatus extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'status',
        'estimatedTime',
    ];

    // Define the many-to-one relationship with order
    public function order()
    {
        return $this->hasOne(Order::class, 'statusId');
    }
}
