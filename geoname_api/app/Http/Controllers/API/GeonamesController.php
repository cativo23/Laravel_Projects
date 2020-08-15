<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MichaelDrennen\Geonames\Models\Geoname;

/**
 * Class GeonamesController that has all the functionality of de API
 *
 * @package App\Http\Controllers\API
 */
class GeonamesController extends Controller
{

    /**
     * This class does a lot of querying on the geonames table. Most of the time we're going to want the same set of
     * fields. No need to duplicate the code all over.
     * @var array
     */
    protected $defaultGeonamesFields = [
        'asciiname','latitude','longitude',
        'country_code',
        'admin1_code',
        'admin2_code', ];

    /**
     * General Function to search geonames by a given term, type and country code
     *
     * @param string|null $term
     * @param string $type
     * @param string|null $country
     * @return Builder[]|Collection|JsonResponse
     */
    public function GetGeonames(string $term = null, string $type='country', string $country=null)
    {
        $query = Geoname::on( env( 'DB_GEONAMES_CONNECTION' ) )
            ->select( $this->defaultGeonamesFields )
            ->where( 'asciiname', 'LIKE',  '%'.$term.'%' );

        $feature_code = null;

        switch ($type){
            case 'region':
                $feature_code = 'ADM1';
                break;

            case 'country':
                $feature_code = 'PCLI';
                break;

            case 'city':
                $feature_code = 'ADM3';
                break;
            default :
                 return response()->json(['error'=>'No type']);
        }

        if ($feature_code){
            $query->where('feature_code','=', $feature_code);
        }

        if ($country){
            $query = $query->where('country_code','=', $country);
        }

        $query->orderBy( 'country_code' )
            ->orderBy( 'admin1_code' )
            ->orderBy( 'admin2_code' )
            ->take(10);

        return  $query->get();
    }

    /**
     * Search Cities given a query and a country
     * @param Request $request
     * @return JsonResponse
     */
    public function SearchCities(Request $request){
        $term = $request->input('q');
        $country = $request->input('country');

        $results = $this->GetGeonames($term, 'city', $country);

        return response()->json( $results );
    }


    /**
     * Search country given a query
     * @param Request $request
     * @return JsonResponse
     */
    public function SearchCountries(Request $request){

        $term = $request->input('q');

        $results = $this->GetGeonames($term, 'country');

        return response()->json( $results );
    }

    /**
     * Search Regions given a query and a country
     * @param Request $request
     * @return JsonResponse
     */
    public function SearchRegions(Request $request){

        $term = $request->input('q');
        $country = $request->input('country');

        $results = $this->GetGeonames($term, 'region', $country);

        return response()->json( $results );
    }

    /**
     * Search anything, this is only for testing purposes only
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function SearchAll(Request $request){
        $term = $request->input('q');

        $query = Geoname::on( env( 'DB_GEONAMES_CONNECTION' ) )
            ->select( $this->defaultGeonamesFields )
            ->where( 'asciiname', 'LIKE', '%'.$term. '%' )
            ->where('country_code','SV')
            ->where('feature_code', 'ADM2')->get();

        return response()->json( $query );
    }
}
