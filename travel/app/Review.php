<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Review
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $text
 * @property string $rating
 * @property string $time_create_yelp
 * @property string $user_name
 * @property string $user_image
 * @property int $restaurant_id
 * @property-read Restaurant $restaurant
 * @method static Builder|Review newModelQuery()
 * @method static Builder|Review newQuery()
 * @method static Builder|Review query()
 * @method static Builder|Review whereCreatedAt($value)
 * @method static Builder|Review whereId($value)
 * @method static Builder|Review whereRating($value)
 * @method static Builder|Review whereRestaurantId($value)
 * @method static Builder|Review whereText($value)
 * @method static Builder|Review whereTimeCreateYelp($value)
 * @method static Builder|Review whereUpdatedAt($value)
 * @method static Builder|Review whereUserImage($value)
 * @method static Builder|Review whereUserName($value)
 * @mixin Eloquent
 */
class Review extends Model
{
    protected $guarded = [
        'id'
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
