<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\RestaurantPhotos
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $url
 * @property int $restaurant_id
 * @property-read Restaurant $restaurant
 * @method static Builder|RestaurantPhotos newModelQuery()
 * @method static Builder|RestaurantPhotos newQuery()
 * @method static Builder|RestaurantPhotos query()
 * @method static Builder|RestaurantPhotos whereCreatedAt($value)
 * @method static Builder|RestaurantPhotos whereId($value)
 * @method static Builder|RestaurantPhotos whereRestaurantId($value)
 * @method static Builder|RestaurantPhotos whereUpdatedAt($value)
 * @method static Builder|RestaurantPhotos whereUrl($value)
 * @mixin Eloquent
 */
class RestaurantPhotos extends Model
{
    protected $guarded = [
        'id'
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
