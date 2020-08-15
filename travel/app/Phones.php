<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Phones
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $fodor_id
 * @property string|null $phone_string
 * @property string|null $phone_desc
 * @property string|null $phone_seq
 * @property string|null $country_code
 * @property string|null $area_code
 * @property string|null $number
 * @property string|null $extension
 * @property string|null $phone_txt
 * @property int $point_of_interest_id
 * @property-read PointOfInterest $poi
 * @method static Builder|Phones newModelQuery()
 * @method static Builder|Phones newQuery()
 * @method static Builder|Phones query()
 * @method static Builder|Phones whereAreaCode($value)
 * @method static Builder|Phones whereCountryCode($value)
 * @method static Builder|Phones whereCreatedAt($value)
 * @method static Builder|Phones whereExtension($value)
 * @method static Builder|Phones whereFodorId($value)
 * @method static Builder|Phones whereId($value)
 * @method static Builder|Phones whereNumber($value)
 * @method static Builder|Phones wherePhoneDesc($value)
 * @method static Builder|Phones wherePhoneSeq($value)
 * @method static Builder|Phones wherePhoneString($value)
 * @method static Builder|Phones wherePhoneTxt($value)
 * @method static Builder|Phones wherePointOfInterestId($value)
 * @method static Builder|Phones whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Phones extends Model
{
    protected $guarded = [
        'id'
    ];

    public function poi(){
        return $this->belongsTo(PointOfInterest::class);
    }

}
