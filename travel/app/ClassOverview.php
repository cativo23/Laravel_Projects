<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\ClassOverview
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $fodor_id
 * @property string|null $text
 * @property string|null $snippet
 * @property int $destination_id
 * @property int|null $class_fodor_id
 * @property-read ClassFodor $class
 * @property-read Destination $destination
 * @method static Builder|ClassOverview newModelQuery()
 * @method static Builder|ClassOverview newQuery()
 * @method static Builder|ClassOverview query()
 * @method static Builder|ClassOverview whereClassFodorId($value)
 * @method static Builder|ClassOverview whereCreatedAt($value)
 * @method static Builder|ClassOverview whereDestinationId($value)
 * @method static Builder|ClassOverview whereFodorId($value)
 * @method static Builder|ClassOverview whereId($value)
 * @method static Builder|ClassOverview whereSnippet($value)
 * @method static Builder|ClassOverview whereText($value)
 * @method static Builder|ClassOverview whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ClassOverview extends Model
{
    protected $fillable = [
        'fodor_id',
        'text',
        'snippet', 'destination_id', 'class_fodor_id'
    ];

    public function destination(){
        return $this->belongsTo(Destination::class);
    }

    public function class(){
        return $this->belongsTo(ClassFodor::class);
    }
}
