<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\ImageFodor
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $fodor_id
 * @property int $sequence
 * @property string $image_url
 * @property string|null $caption
 * @property string|null $copyright
 * @property string|null $usage_rights
 * @property string|null $credit
 * @property string|null $keyword_list
 * @property int $destination_id
 * @property-read Destination $destination
 * @method static Builder|ImageFodor newModelQuery()
 * @method static Builder|ImageFodor newQuery()
 * @method static Builder|ImageFodor query()
 * @method static Builder|ImageFodor whereCaption($value)
 * @method static Builder|ImageFodor whereCopyright($value)
 * @method static Builder|ImageFodor whereCreatedAt($value)
 * @method static Builder|ImageFodor whereCredit($value)
 * @method static Builder|ImageFodor whereDestinationId($value)
 * @method static Builder|ImageFodor whereFodorId($value)
 * @method static Builder|ImageFodor whereId($value)
 * @method static Builder|ImageFodor whereImageUrl($value)
 * @method static Builder|ImageFodor whereKeywordList($value)
 * @method static Builder|ImageFodor whereSequence($value)
 * @method static Builder|ImageFodor whereUpdatedAt($value)
 * @method static Builder|ImageFodor whereUsageRights($value)
 * @mixin Eloquent
 */
class ImageFodor extends Model
{
    protected $guarded = ['id'];

    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
