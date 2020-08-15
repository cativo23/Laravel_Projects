<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Pro
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $text
 * @property int $point_of_interest_id
 * @property-read PointOfInterest $poi
 * @method static Builder|Pro newModelQuery()
 * @method static Builder|Pro newQuery()
 * @method static Builder|Pro query()
 * @method static Builder|Pro whereCreatedAt($value)
 * @method static Builder|Pro whereId($value)
 * @method static Builder|Pro wherePointOfInterestId($value)
 * @method static Builder|Pro whereText($value)
 * @method static Builder|Pro whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Pro extends Model
{
    protected $fillable = ['text'];

    public function poi (){
        return $this->belongsTo(PointOfInterest::class);
    }
}
