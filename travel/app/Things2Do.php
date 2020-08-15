<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Things2Do
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string $intro
 * @property string $image
 * @property string $link
 * @property string $place
 * @property int $destination_id
 * @property-read Destination $destination
 * @method static Builder|Things2Do newModelQuery()
 * @method static Builder|Things2Do newQuery()
 * @method static Builder|Things2Do query()
 * @method static Builder|Things2Do whereCreatedAt($value)
 * @method static Builder|Things2Do whereDestinationId($value)
 * @method static Builder|Things2Do whereId($value)
 * @method static Builder|Things2Do whereImage($value)
 * @method static Builder|Things2Do whereIntro($value)
 * @method static Builder|Things2Do whereLink($value)
 * @method static Builder|Things2Do wherePlace($value)
 * @method static Builder|Things2Do whereTitle($value)
 * @method static Builder|Things2Do whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Things2Do extends Model
{
    protected $fillable = [
        'title',
        'intro',
        'image',
        'link',
        'place'
    ];

    public function getImage(){
        return $this->image;
    }

    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
