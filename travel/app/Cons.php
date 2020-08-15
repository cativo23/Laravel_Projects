<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Cons
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $text
 * @property int $point_of_interest_id
 * @property-read PointOfInterest $poi
 * @method static Builder|Cons newModelQuery()
 * @method static Builder|Cons newQuery()
 * @method static Builder|Cons query()
 * @method static Builder|Cons whereCreatedAt($value)
 * @method static Builder|Cons whereId($value)
 * @method static Builder|Cons wherePointOfInterestId($value)
 * @method static Builder|Cons whereText($value)
 * @method static Builder|Cons whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Cons extends Model
{
    protected $fillable = ['text'];

    public function poi (){
        return $this->belongsTo(PointOfInterest::class);
    }
}
