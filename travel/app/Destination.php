<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Destination
 *
 * @method static firstWhere(string $string, $env)
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property int $sequence
 * @property int $fodor_id
 * @property string $name_path
 * @property string $id_path
 * @property string $geo_type
 * @property string $slug
 * @property string|null $image_header
 * @property string|null $image_header_thumbnail
 * @property string|null $link_external
 * @property int $use_t2d
 * @property int $use_bd_btn
 * @property int $use_hotels
 * @property int $use_restaurants
 * @property int $use_gallery
 * @property int $use_viator_t2d
 * @property int $use_xperience_more
 * @property int $show_on_parent
 * @property int|null $parent_id
 * @property string|null $logo
 * @property string|null $logo_sticky
 * @property string|null $hero_video
 * @property string|null $email
 * @property int $is_available
 * @property int|null $viator_id
 * @property string|null $rest_areas
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Collection|Article[] $articles
 * @property-read int|null $articles_count
 * @property-read Collection|ClassOverview[] $classOverviews
 * @property-read int|null $class_overviews_count
 * @property-read Collection|Destination[] $destinations
 * @property-read int|null $destinations_count
 * @property-read Collection|Feature[] $features
 * @property-read int|null $features_count
 * @property-read Collection|Gallery[] $galleries
 * @property-read int|null $galleries_count
 * @property-read Collection|Hotels[] $hotels
 * @property-read int|null $hotels_count
 * @property-read Collection|ImageFodor[] $images
 * @property-read int|null $images_count
 * @property-read Overview|null $overview
 * @property-read Destination|null $parent
 * @property-read Collection|PointOfInterest[] $pois
 * @property-read int|null $pois_count
 * @property-read Collection|Things2Do[] $things2Do
 * @property-read int|null $things2_do_count
 * @property-read Collection|TravelTip[] $travelTips
 * @property-read int|null $travel_tips_count
 * @property-read Collection|Trip[] $trips
 * @property-read int|null $trips_count
 * @method static Builder|Destination newModelQuery()
 * @method static Builder|Destination newQuery()
 * @method static Builder|Destination query()
 * @method static Builder|Destination whereCreatedAt($value)
 * @method static Builder|Destination whereEmail($value)
 * @method static Builder|Destination whereFodorId($value)
 * @method static Builder|Destination whereGeoType($value)
 * @method static Builder|Destination whereHeroVideo($value)
 * @method static Builder|Destination whereId($value)
 * @method static Builder|Destination whereIdPath($value)
 * @method static Builder|Destination whereImageHeader($value)
 * @method static Builder|Destination whereImageHeaderThumbnail($value)
 * @method static Builder|Destination whereIsAvailable($value)
 * @method static Builder|Destination whereLinkExternal($value)
 * @method static Builder|Destination whereLogo($value)
 * @method static Builder|Destination whereLogoSticky($value)
 * @method static Builder|Destination whereName($value)
 * @method static Builder|Destination whereNamePath($value)
 * @method static Builder|Destination whereParentId($value)
 * @method static Builder|Destination whereRestAreas($value)
 * @method static Builder|Destination whereSequence($value)
 * @method static Builder|Destination whereShowOnParent($value)
 * @method static Builder|Destination whereSlug($value)
 * @method static Builder|Destination whereUpdatedAt($value)
 * @method static Builder|Destination whereUseBdBtn($value)
 * @method static Builder|Destination whereUseGallery($value)
 * @method static Builder|Destination whereUseHotels($value)
 * @method static Builder|Destination whereUseRestaurants($value)
 * @method static Builder|Destination whereUseT2d($value)
 * @method static Builder|Destination whereUseViatorT2d($value)
 * @method static Builder|Destination whereUseXperienceMore($value)
 * @method static Builder|Destination whereViatorId($value)
 * @mixin Eloquent
 */
class Destination extends Model
{
    protected $guarded = [
        'id'
    ];

    public function children(){
        return Destination::where([['parent_id','=', $this->fodor_id],['show_on_parent','=', true]])->get()->sortBy('sequence');
    }

    public function siblings(){
        return Destination::where([['parent_id','=', $this->parent_id],['show_on_parent','=', true]])->get();
    }

    public function dad(){
        return Destination::where('fodor_id', $this->parent_id)->first();
    }

    public function things2Do(){
        return $this->hasMany(Things2Do::Class);
    }

    public function hotels(){
        return $this->hasMany(Hotels::class);
    }

    public function MainGallery(){
        return Gallery::where([['destination_id', '=', $this->id], ['id','=',1]])->first();
    }

    public function preview_gallery(){
        return $this->galleries()->where('destination_id', '=', $this->id)->get()->first()->images->take(8);
    }

    public function parent()
    {
        return $this->belongsTo(Destination::class);
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class, 'parent_id');
    }

    public function images()
    {
        return $this->hasMany(ImageFodor::class, 'destination_id', 'fodor_id');
    }

    public function overview()
    {
        return $this->hasOne(Overview::class);
    }

    public function classOverviews()
    {
        return $this->hasMany(ClassOverview::class);
    }

    public function travelTips(){
        return $this->hasMany(TravelTip::class);
    }

    public function features(){
        return $this->hasMany(Feature::class);
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function trips(){
        return $this->belongsToMany(Trip::class, 'destination_trip', 'fodor_id', 'trip_id')
            ->using(DestinationTrip::class)->withTimestamps()
            ->withPivot('dist_from_dest', 'time_to_visit');
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function pois(){
        return $this->belongsToMany(PointOfInterest::class, 'point_dest');
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    /**
     * @return Collection
     */
    public function rest_art(){
        return $this->articles()->where('type', '=', 'rest')->get();
    }

    /**
     * @return Collection
     */
    public function do_art(){
        return $this->articles()->where('type', '=', 'do')->get();
    }
}
