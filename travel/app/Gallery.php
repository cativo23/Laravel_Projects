<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Gallery
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property int $destination_id
 * @property-read Destination $destination
 * @property-read Collection|ImageGallery[] $images
 * @property-read int|null $images_count
 * @method static Builder|Gallery newModelQuery()
 * @method static Builder|Gallery newQuery()
 * @method static Builder|Gallery query()
 * @method static Builder|Gallery whereCreatedAt($value)
 * @method static Builder|Gallery whereDestinationId($value)
 * @method static Builder|Gallery whereId($value)
 * @method static Builder|Gallery whereName($value)
 * @method static Builder|Gallery whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Gallery extends Model
{
    protected $fillable = [
        'name'
    ];

    public function destination(){
        return $this->belongsTo(Destination::class);
    }

    public function images(){
        return $this->hasMany(ImageGallery::class);
    }

    public function preview(){
        return ImageGallery::where('gallery_id',1)->take(8)->get();
    }
}
