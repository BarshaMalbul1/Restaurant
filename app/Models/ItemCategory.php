<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemCategory
 *
 * @property int $id
 * @property string $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ItemCategory> $item
 * @property-read int|null $item_count
 * @method static \Database\Factories\ItemCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCategory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ItemCategory extends Model
{
    use HasFactory;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'category',
        'created_at',
        'updated_at'
    ];

    // Define the one-to-one relationship with Customer
    public function item()
    {
        return $this->hasMany(ItemCategory::class, 'categoryId');
    }
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(50)
            ->hasPosts(1)
            ->create();
    }
}
