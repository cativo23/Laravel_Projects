<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Overview
 *
 * @property int $id
 * @property string|null $text
 * @property string|null $snippet
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $destination_id
 * @property-read Destination $destination
 * @method static Builder|Overview newModelQuery()
 * @method static Builder|Overview newQuery()
 * @method static Builder|Overview query()
 * @method static Builder|Overview whereCreatedAt($value)
 * @method static Builder|Overview whereDestinationId($value)
 * @method static Builder|Overview whereId($value)
 * @method static Builder|Overview whereSnippet($value)
 * @method static Builder|Overview whereText($value)
 * @method static Builder|Overview whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Overview extends Model
{
    protected $fillable = [
        'text',
        'snippet'
    ];

    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
