<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Restaurant
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $alias
 * @property string|null $name
 * @property string|null $image_url
 * @property string|null $is_closed
 * @property string|null $url
 * @property string|null $phone
 * @property string|null $display_phone
 * @property string|null $review_count
 * @property string|null $rating
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $address3
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $country
 * @property string|null $display_address
 * @property string|null $cross_streets
 * @property string|null $price
 * @property string|null $transactions
 * @property-read Collection|RestaurantCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read Collection|RestaurantPhotos[] $photos
 * @property-read int|null $photos_count
 * @property-read PointOfInterest $poi
 * @property-read Collection|Review[] $reviews
 * @property-read int|null $reviews_count
 * @method static Builder|Restaurant newModelQuery()
 * @method static Builder|Restaurant newQuery()
 * @method static Builder|Restaurant query()
 * @method static Builder|Restaurant whereAddress1($value)
 * @method static Builder|Restaurant whereAddress2($value)
 * @method static Builder|Restaurant whereAddress3($value)
 * @method static Builder|Restaurant whereAlias($value)
 * @method static Builder|Restaurant whereCity($value)
 * @method static Builder|Restaurant whereCountry($value)
 * @method static Builder|Restaurant whereCreatedAt($value)
 * @method static Builder|Restaurant whereCrossStreets($value)
 * @method static Builder|Restaurant whereDisplayAddress($value)
 * @method static Builder|Restaurant whereDisplayPhone($value)
 * @method static Builder|Restaurant whereId($value)
 * @method static Builder|Restaurant whereImageUrl($value)
 * @method static Builder|Restaurant whereIsClosed($value)
 * @method static Builder|Restaurant whereName($value)
 * @method static Builder|Restaurant wherePhone($value)
 * @method static Builder|Restaurant wherePrice($value)
 * @method static Builder|Restaurant whereRating($value)
 * @method static Builder|Restaurant whereReviewCount($value)
 * @method static Builder|Restaurant whereState($value)
 * @method static Builder|Restaurant whereTransactions($value)
 * @method static Builder|Restaurant whereUpdatedAt($value)
 * @method static Builder|Restaurant whereUrl($value)
 * @method static Builder|Restaurant whereZip($value)
 * @mixin Eloquent
 */
class Restaurant extends Model
{
    protected $guarded = [
        'id'
    ];

    public function poi(){
        return $this->belongsTo(PointOfInterest::class);
    }

    public function categories(){
        return $this->belongsToMany(RestaurantCategory::class);
    }

    public function photos(){
        return $this->hasMany(RestaurantPhotos::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
