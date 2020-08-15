<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Article
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $image
 * @property string $title
 * @property string $text
 * @property string $quote
 * @property string $slug
 * @property int $destination_id
 * @property string|null $type
 * @property-read Destination $destination
 * @property-read Collection|Section[] $sections
 * @property-read int|null $sections_count
 * @method static Builder|Article newModelQuery()
 * @method static Builder|Article newQuery()
 * @method static Builder|Article query()
 * @method static Builder|Article whereCreatedAt($value)
 * @method static Builder|Article whereDestinationId($value)
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article whereImage($value)
 * @method static Builder|Article whereQuote($value)
 * @method static Builder|Article whereSlug($value)
 * @method static Builder|Article whereText($value)
 * @method static Builder|Article whereTitle($value)
 * @method static Builder|Article whereType($value)
 * @method static Builder|Article whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Article extends Model
{
    protected $guarded = ['id'];

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
