<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\TravelTip
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string|null $snippet
 * @property string|null $text
 * @property string $fodor_id
 * @property string $head_id
 * @property string $head_title
 * @property int $destination_id
 * @property-read Destination $destination
 * @method static Builder|TravelTip newModelQuery()
 * @method static Builder|TravelTip newQuery()
 * @method static Builder|TravelTip query()
 * @method static Builder|TravelTip whereCreatedAt($value)
 * @method static Builder|TravelTip whereDestinationId($value)
 * @method static Builder|TravelTip whereFodorId($value)
 * @method static Builder|TravelTip whereHeadId($value)
 * @method static Builder|TravelTip whereHeadTitle($value)
 * @method static Builder|TravelTip whereId($value)
 * @method static Builder|TravelTip whereSnippet($value)
 * @method static Builder|TravelTip whereText($value)
 * @method static Builder|TravelTip whereTitle($value)
 * @method static Builder|TravelTip whereUpdatedAt($value)
 * @mixin Eloquent
 */
class TravelTip extends Model
{
    protected $fillable = [
        'title',
        'snippet',
        'text','fodor_id','head_id','head_title', 'destination_id'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
