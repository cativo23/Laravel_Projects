<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\ClassFodor
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $fodor_id
 * @property string $name
 * @property-read Collection|Feature[] $features
 * @property-read int|null $features_count
 * @property-read Collection|PointOfInterest[] $pois
 * @property-read int|null $pois_count
 * @method static Builder|ClassFodor newModelQuery()
 * @method static Builder|ClassFodor newQuery()
 * @method static Builder|ClassFodor query()
 * @method static Builder|ClassFodor whereCreatedAt($value)
 * @method static Builder|ClassFodor whereFodorId($value)
 * @method static Builder|ClassFodor whereId($value)
 * @method static Builder|ClassFodor whereName($value)
 * @method static Builder|ClassFodor whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ClassFodor extends Model
{
    protected $fillable = [
        'fodor_id',
        'name'
    ];

    public function features (){
        return $this->belongsToMany(Feature::class);
    }

    public function pois(){
        return $this->belongsToMany(PointOfInterest::class, 'point_class');
    }
}
