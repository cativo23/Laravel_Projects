<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\PointOfInterest
 *
 * @method static firstWhere(string $string, $code)
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $email
 * @property string|null $web
 * @property string|null $review
 * @property string|null $review_snippet
 * @property string|null $admission
 * @property string|null $card_policy
 * @property string|null $open_hours
 * @property string|null $closed_hours
 * @property string|null $res_policy
 * @property string|null $rooms
 * @property string|null $meal_plans
 * @property string|null $miscellaneous
 * @property int|null $fodor_id
 * @property string|null $slug
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $country
 * @property string|null $metro
 * @property string|null $directions
 * @property string|null $address_string
 * @property string|null $prefix
 * @property string|null $street_address
 * @property string|null $suffix
 * @property string|null $neighborhood
 * @property string|null $city
 * @property-read Collection|ClassFodor[] $classes
 * @property-read int|null $classes_count
 * @property-read Collection|Cons[] $cons
 * @property-read int|null $cons_count
 * @property-read Collection|Destination[] $destinations
 * @property-read int|null $destinations_count
 * @property-read Collection|Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read Collection|Phones[] $phones
 * @property-read int|null $phones_count
 * @property-read Collection|Pro[] $pros
 * @property-read int|null $pros_count
 * @property-read Restaurant|null $restaurant
 * @method static Builder|PointOfInterest newModelQuery()
 * @method static Builder|PointOfInterest newQuery()
 * @method static Builder|PointOfInterest query()
 * @method static Builder|PointOfInterest whereAddressString($value)
 * @method static Builder|PointOfInterest whereAdmission($value)
 * @method static Builder|PointOfInterest whereCardPolicy($value)
 * @method static Builder|PointOfInterest whereCity($value)
 * @method static Builder|PointOfInterest whereClosedHours($value)
 * @method static Builder|PointOfInterest whereCountry($value)
 * @method static Builder|PointOfInterest whereCreatedAt($value)
 * @method static Builder|PointOfInterest whereDirections($value)
 * @method static Builder|PointOfInterest whereEmail($value)
 * @method static Builder|PointOfInterest whereFodorId($value)
 * @method static Builder|PointOfInterest whereId($value)
 * @method static Builder|PointOfInterest whereLatitude($value)
 * @method static Builder|PointOfInterest whereLongitude($value)
 * @method static Builder|PointOfInterest whereMealPlans($value)
 * @method static Builder|PointOfInterest whereMetro($value)
 * @method static Builder|PointOfInterest whereMiscellaneous($value)
 * @method static Builder|PointOfInterest whereName($value)
 * @method static Builder|PointOfInterest whereNeighborhood($value)
 * @method static Builder|PointOfInterest whereOpenHours($value)
 * @method static Builder|PointOfInterest wherePrefix($value)
 * @method static Builder|PointOfInterest whereResPolicy($value)
 * @method static Builder|PointOfInterest whereReview($value)
 * @method static Builder|PointOfInterest whereReviewSnippet($value)
 * @method static Builder|PointOfInterest whereRooms($value)
 * @method static Builder|PointOfInterest whereSlug($value)
 * @method static Builder|PointOfInterest whereState($value)
 * @method static Builder|PointOfInterest whereStreetAddress($value)
 * @method static Builder|PointOfInterest whereSuffix($value)
 * @method static Builder|PointOfInterest whereUpdatedAt($value)
 * @method static Builder|PointOfInterest whereWeb($value)
 * @method static Builder|PointOfInterest whereZip($value)
 * @mixin Eloquent
 */
class PointOfInterest extends Model
{
    protected $guarded = [
        'id',
    ];

    public function restaurant(){
        return $this->hasOne(Restaurant::class);
    }

    public function phones()
    {
        return $this->hasMany(Phones::class);
    }

    public function classes(){
        return $this->belongsToMany(ClassFodor::class, 'point_class');
    }

    public function keywords(){
        return $this->belongsToMany(Keyword::class, 'point_keyword');
    }

    public function destinations(){
        return $this->belongsToMany(Destination::class, 'point_dest');
    }

    public function pros(){
        return $this->hasMany(Pro::class);
    }

    public function cons(){
        return $this->hasMany(Cons::class);
    }
}
