<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Section
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string $text
 * @property string $image
 * @property string|null $caption
 * @property int $article_id
 * @property-read Article $article
 * @method static Builder|Section newModelQuery()
 * @method static Builder|Section newQuery()
 * @method static Builder|Section query()
 * @method static Builder|Section whereArticleId($value)
 * @method static Builder|Section whereCaption($value)
 * @method static Builder|Section whereCreatedAt($value)
 * @method static Builder|Section whereId($value)
 * @method static Builder|Section whereImage($value)
 * @method static Builder|Section whereText($value)
 * @method static Builder|Section whereTitle($value)
 * @method static Builder|Section whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Section extends Model
{
    protected $guarded = ['id'];

    public function article(){
        return $this->belongsTo(Article::class);
    }

}
