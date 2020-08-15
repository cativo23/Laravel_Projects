<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Keyword
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $fodor_id
 * @property string $name
 * @property int|null $parent_id
 * @property-read Keyword|null $parent
 * @property-read Collection|PointOfInterest[] $pois
 * @property-read int|null $pois_count
 * @method static Builder|Keyword newModelQuery()
 * @method static Builder|Keyword newQuery()
 * @method static Builder|Keyword query()
 * @method static Builder|Keyword whereCreatedAt($value)
 * @method static Builder|Keyword whereFodorId($value)
 * @method static Builder|Keyword whereId($value)
 * @method static Builder|Keyword whereName($value)
 * @method static Builder|Keyword whereParentId($value)
 * @method static Builder|Keyword whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Keyword extends Model
{
    protected $fillable = ['name','fodor_id', 'parent_id'];

    public function parent(){
        return $this->hasOne(Keyword::class, 'parent_id');
    }

    public function pois(){
        return $this->belongsToMany(PointOfInterest::class, 'point_keyword', '');
    }
}
