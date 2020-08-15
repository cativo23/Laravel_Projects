<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Feature
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $fodor_id
 * @property string|null $title
 * @property string|null $text
 * @property string|null $snippet
 * @property string|null $web_class_id
 * @property int|null $class_id
 * @property ClassFodor|null $class
 * @property int $destination_id
 * @property-read Destination $destination
 * @method static Builder|Feature newModelQuery()
 * @method static Builder|Feature newQuery()
 * @method static Builder|Feature query()
 * @method static Builder|Feature whereClass($value)
 * @method static Builder|Feature whereClassId($value)
 * @method static Builder|Feature whereCreatedAt($value)
 * @method static Builder|Feature whereDestinationId($value)
 * @method static Builder|Feature whereFodorId($value)
 * @method static Builder|Feature whereId($value)
 * @method static Builder|Feature whereSnippet($value)
 * @method static Builder|Feature whereText($value)
 * @method static Builder|Feature whereTitle($value)
 * @method static Builder|Feature whereUpdatedAt($value)
 * @method static Builder|Feature whereWebClassId($value)
 * @mixin Eloquent
 */
class Feature extends Model
{
    protected $fillable = [
        'title',
        'text',
        'snippet', 'fodor_id', 'web_class_id','class_id','class', 'destination_id'
    ];

    public  function destination(){
        return $this->belongsTo(Destination::class);
    }

    public function  class(){
        return $this->hasOne(ClassFodor::class);
    }


}
