<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Activity
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $fodor_id
 * @property string $title
 * @property string $text
 * @property string $snippet
 * @property int $destination_id
 * @property-read Destination $destination
 * @method static Builder|Activity newModelQuery()
 * @method static Builder|Activity newQuery()
 * @method static Builder|Activity query()
 * @method static Builder|Activity whereCreatedAt($value)
 * @method static Builder|Activity whereDestinationId($value)
 * @method static Builder|Activity whereFodorId($value)
 * @method static Builder|Activity whereId($value)
 * @method static Builder|Activity whereSnippet($value)
 * @method static Builder|Activity whereText($value)
 * @method static Builder|Activity whereTitle($value)
 * @method static Builder|Activity whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Activity extends Model
{
    protected $fillable = [
        'title',
        'text',
        'snippet','fodor_id','destination_id'
    ];

    public function destination() {
        return $this->belongsTo(Destination::class, 'destination_id', 'fodor_id');
    }
}
