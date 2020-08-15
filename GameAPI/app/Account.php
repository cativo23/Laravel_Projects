<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Account
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $score
 * @property int $correct_answers
 * @property int $level
 * @property int $user_id
 * @property-read User|null $user
 * @method static Builder|Account newModelQuery()
 * @method static Builder|Account newQuery()
 * @method static Builder|Account query()
 * @method static Builder|Account whereCorrectAnswers($value)
 * @method static Builder|Account whereCreatedAt($value)
 * @method static Builder|Account whereId($value)
 * @method static Builder|Account whereLevel($value)
 * @method static Builder|Account whereScore($value)
 * @method static Builder|Account whereUpdatedAt($value)
 * @method static Builder|Account whereUserId($value)
 * @mixin Eloquent
 */
class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'score','user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
