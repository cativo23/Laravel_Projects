<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

/**
 * App\DestinationTrip
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $dist_from_dest
 * @property string $time_to_visit
 * @property int $destination_id
 * @property int $trip_id
 * @property-read Collection|BestForType[] $best_for_types
 * @property-read int|null $best_for_types_count
 * @method static Builder|DestinationTrip newModelQuery()
 * @method static Builder|DestinationTrip newQuery()
 * @method static Builder|DestinationTrip query()
 * @method static Builder|DestinationTrip whereCreatedAt($value)
 * @method static Builder|DestinationTrip whereDestinationId($value)
 * @method static Builder|DestinationTrip whereDistFromDest($value)
 * @method static Builder|DestinationTrip whereId($value)
 * @method static Builder|DestinationTrip whereTimeToVisit($value)
 * @method static Builder|DestinationTrip whereTripId($value)
 * @method static Builder|DestinationTrip whereUpdatedAt($value)
 * @mixin Eloquent
 */
class DestinationTrip extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public function best_for_types (){
        return $this->belongsToMany(BestForType::class, 'best_destination_trip', 'destination_trip_id', 'fodor_id');
    }
}
