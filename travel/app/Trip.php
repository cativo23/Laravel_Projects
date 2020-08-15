<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Trip
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $fodor_id
 * @property string $title
 * @property string $short_intro
 * @property string $main_intro
 * @property string $fri_text
 * @property string $sat_text
 * @property string $sun_text
 * @property string $url_slug
 * @property string $latitude
 * @property string $longitude
 * @property string $did_you_know
 * @property string $where_to_stay
 * @property string $when_to_go
 * @property string $how_to_get_there
 * @property string|null $image_url
 * @property string|null $caption
 * @property string|null $credit
 * @property string|null $copyright
 * @property string|null $usage_rights
 * @property string|null $keyword_list
 * @property-read Collection|Destination[] $destinations
 * @property-read int|null $destinations_count
 * @property-read Collection|ReferenceListing[] $reference_listings
 * @property-read int|null $reference_listings_count
 * @method static Builder|Trip newModelQuery()
 * @method static Builder|Trip newQuery()
 * @method static Builder|Trip query()
 * @method static Builder|Trip whereCaption($value)
 * @method static Builder|Trip whereCopyright($value)
 * @method static Builder|Trip whereCreatedAt($value)
 * @method static Builder|Trip whereCredit($value)
 * @method static Builder|Trip whereDidYouKnow($value)
 * @method static Builder|Trip whereFodorId($value)
 * @method static Builder|Trip whereFriText($value)
 * @method static Builder|Trip whereHowToGetThere($value)
 * @method static Builder|Trip whereId($value)
 * @method static Builder|Trip whereImageUrl($value)
 * @method static Builder|Trip whereKeywordList($value)
 * @method static Builder|Trip whereLatitude($value)
 * @method static Builder|Trip whereLongitude($value)
 * @method static Builder|Trip whereMainIntro($value)
 * @method static Builder|Trip whereSatText($value)
 * @method static Builder|Trip whereShortIntro($value)
 * @method static Builder|Trip whereSunText($value)
 * @method static Builder|Trip whereTitle($value)
 * @method static Builder|Trip whereUpdatedAt($value)
 * @method static Builder|Trip whereUrlSlug($value)
 * @method static Builder|Trip whereUsageRights($value)
 * @method static Builder|Trip whereWhenToGo($value)
 * @method static Builder|Trip whereWhereToStay($value)
 * @mixin Eloquent
 */
class Trip extends Model
{
    protected $fillable = [
        'title',
        'short_intro',
        'main_intro',
        'fri_text',
        'sat_text',
        'sun_text',
        'url_slug',
        'latitude', 'longitude', 'did_you_know', 'where_to_stay', 'when_to_go', 'how_to_get_there', 'image_url', 'caption', 'keyword_list'
    ];

    public function reference_listings()
    {
        return $this->hasMany(ReferenceListing::class);
    }

    public function destinations()
    {
        return $this->belongsToMany(Destination::class,'destination_trip','fodor_id','fodor_id')
            ->using(DestinationTrip::class)->withTimestamps()
            ->withPivot('dist_from_dest', 'time_to_visit');
    }


}
