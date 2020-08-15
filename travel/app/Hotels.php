<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Hotels
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property string $image
 * @property string $link
 * @property int $destination_id
 * @property-read Destination $destination
 * @method static Builder|Hotels newModelQuery()
 * @method static Builder|Hotels newQuery()
 * @method static Builder|Hotels query()
 * @method static Builder|Hotels whereCreatedAt($value)
 * @method static Builder|Hotels whereDestinationId($value)
 * @method static Builder|Hotels whereId($value)
 * @method static Builder|Hotels whereImage($value)
 * @method static Builder|Hotels whereLink($value)
 * @method static Builder|Hotels whereName($value)
 * @method static Builder|Hotels whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Hotels extends Model
{
    protected $fillable = [
      'name',
      'link',
      'image'
    ];

    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
