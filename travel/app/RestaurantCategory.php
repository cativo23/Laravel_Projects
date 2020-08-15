<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\RestaurantCategory
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $alias
 * @property string $title
 * @property string|null $parent
 * @property-read Collection|Restaurant[] $restaurants
 * @property-read int|null $restaurants_count
 * @method static Builder|RestaurantCategory newModelQuery()
 * @method static Builder|RestaurantCategory newQuery()
 * @method static Builder|RestaurantCategory query()
 * @method static Builder|RestaurantCategory whereAlias($value)
 * @method static Builder|RestaurantCategory whereCreatedAt($value)
 * @method static Builder|RestaurantCategory whereId($value)
 * @method static Builder|RestaurantCategory whereParent($value)
 * @method static Builder|RestaurantCategory whereTitle($value)
 * @method static Builder|RestaurantCategory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class RestaurantCategory extends Model
{
    protected $guarded = [
        'id'
    ];

    public function restaurants(){
        return $this->belongsToMany(Restaurant::class);
    }
}
