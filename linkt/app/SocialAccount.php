<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\SocialAccount
 *
 * @method static Builder|SocialAccount newModelQuery()
 * @method static Builder|SocialAccount newQuery()
 * @method static Builder|SocialAccount query()
 * @mixin Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $provider_id
 * @property string $provider
 * @property string $token
 * @property int $user_id
 * @method static Builder|SocialAccount whereCreatedAt($value)
 * @method static Builder|SocialAccount whereId($value)
 * @method static Builder|SocialAccount whereProvider($value)
 * @method static Builder|SocialAccount whereProviderId($value)
 * @method static Builder|SocialAccount whereToken($value)
 * @method static Builder|SocialAccount whereUpdatedAt($value)
 * @method static Builder|SocialAccount whereUserId($value)
 * @property-read User $user
 */
class SocialAccount extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
