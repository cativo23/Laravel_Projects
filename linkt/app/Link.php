<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Link
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property string $url
 * @property User $user
 * @method static Builder|Link newModelQuery()
 * @method static Builder|Link newQuery()
 * @method static Builder|Link query()
 * @method static Builder|Link whereCreatedAt($value)
 * @method static Builder|Link whereId($value)
 * @method static Builder|Link whereName($value)
 * @method static Builder|Link whereUpdatedAt($value)
 * @method static Builder|Link whereUrl($value)
 * @method static Builder|Link whereUser($value)
 * @mixin Eloquent
 */
class Link extends Model
{
    protected $fillable = [
        'name', 'url', 'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

}
