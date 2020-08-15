<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\BestForType
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property-read Collection|DestinationTrip[] $destination_trip
 * @property-read int|null $destination_trip_count
 * @method static Builder|BestForType newModelQuery()
 * @method static Builder|BestForType newQuery()
 * @method static Builder|BestForType query()
 * @method static Builder|BestForType whereCreatedAt($value)
 * @method static Builder|BestForType whereFodorId($value)
 * @method static Builder|BestForType whereId($value)
 * @method static Builder|BestForType whereName($value)
 * @method static Builder|BestForType whereUpdatedAt($value)
 * @mixin Eloquent
 */
class BestForType extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $guarded = [
        'id'
    ];

    public function destination_trip(){
        return $this->belongsToMany(DestinationTrip::class, 'best_destination_trip', 'fodor_id', 'destination_trip_id');
    }
}
