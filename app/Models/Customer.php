<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property int $user_id
 * @property string $diet_preference
 * @property string $allergy
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Customer> $order
 * @property-read int|null $order_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAllergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereDietPreference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUserId($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'diet_preference',
        'allergy',
    ];

    // Define the inverse of the one-to-one relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the one-to-many relationship with Customer
    public function order()
    {
        return $this->hasMany(Customer::class, 'customerId');
    }
}
