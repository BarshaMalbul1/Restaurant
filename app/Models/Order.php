<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $special_request
 * @property float $total_amount
 * @property int $customer_id
 * @property int $order_status_id
 * @property string $pick_up_time
 * @property mixed $orderItems
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer $customer
 * @property-read \App\Models\OrderStatus|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePickUpTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSpecialRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customerId',
        'statusId',
        'totalAmount',
        'pickUpTime',
        'specialRequest',
        'orderItems',
    ];

    // Define the inverse of the one-to-one relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Define the inverse of the one-to-many relationship with Status
    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
