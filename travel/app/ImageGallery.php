<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\ImageGallery
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $image
 * @property string $title
 * @property int $gallery_id
 * @property-read Gallery $Gallery
 * @method static Builder|ImageGallery newModelQuery()
 * @method static Builder|ImageGallery newQuery()
 * @method static Builder|ImageGallery query()
 * @method static Builder|ImageGallery whereCreatedAt($value)
 * @method static Builder|ImageGallery whereGalleryId($value)
 * @method static Builder|ImageGallery whereId($value)
 * @method static Builder|ImageGallery whereImage($value)
 * @method static Builder|ImageGallery whereTitle($value)
 * @method static Builder|ImageGallery whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ImageGallery extends Model
{
    protected $fillable = [
        'title',
        'image'
    ];

    public function Gallery(){
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }
}
