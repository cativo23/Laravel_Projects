<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\ReferenceListing
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $reference_listing_id
 * @property string $listing_name
 * @property string $street_address
 * @property string|null $suffix
 * @property string $city
 * @property string $state
 * @property string $phone
 * @property string $web
 * @property string $latitude
 * @property string $longitude
 * @property int $trip_id
 * @property-read Trip $trip
 * @method static Builder|ReferenceListing newModelQuery()
 * @method static Builder|ReferenceListing newQuery()
 * @method static Builder|ReferenceListing query()
 * @method static Builder|ReferenceListing whereCity($value)
 * @method static Builder|ReferenceListing whereCreatedAt($value)
 * @method static Builder|ReferenceListing whereId($value)
 * @method static Builder|ReferenceListing whereLatitude($value)
 * @method static Builder|ReferenceListing whereListingName($value)
 * @method static Builder|ReferenceListing whereLongitude($value)
 * @method static Builder|ReferenceListing wherePhone($value)
 * @method static Builder|ReferenceListing whereReferenceListingId($value)
 * @method static Builder|ReferenceListing whereState($value)
 * @method static Builder|ReferenceListing whereStreetAddress($value)
 * @method static Builder|ReferenceListing whereSuffix($value)
 * @method static Builder|ReferenceListing whereTripId($value)
 * @method static Builder|ReferenceListing whereUpdatedAt($value)
 * @method static Builder|ReferenceListing whereWeb($value)
 * @mixin Eloquent
 */
class ReferenceListing extends Model
{
    protected $fillable = [];

    public function trip(){
        return $this->belongsTo(Trip::class);
    }
}
