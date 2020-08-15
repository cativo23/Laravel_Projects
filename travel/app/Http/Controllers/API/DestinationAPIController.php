<?php
namespace App\Http\Controllers\API;

use App\Destination;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DestinationAPIController extends Controller
{
    /**
     * Gets the destinations for query
     * @param Request $request
     * @return JsonResponse
     */
    public function GetDestination(Request $request){
        $term = $request->input('term');

        $destination = Destination::select('name as label', 'fodor_id as value')->where('name', 'like', '%'.$term.'%')->get();
        return response()->json( $destination, 200, ['Access-Control-Allow-Origin'=>'*']);
    }

    public function GetDnsInfo(Request $request){

        $term = $request->input('term');

        $auth = 'sso-key '."dKNjuJHv89o3_BeCsVRZGwikDGKTCMzQUku:3uq53998hweyKnTvnNfESx"; //TODO: place this on .env

        $headers = [
            'Authorization'=>$auth
        ];

        $client = new GuzzleClient(['headers'=>$headers]);
        $domain_data = array();

        try {
            $response= $client->request('GET', 'https://api.godaddy.com/v1/domains/'.$term);
            $domain_data = json_decode($response->getBody(), 'true');
        }catch (ClientException $e){
            $response = $e->getResponse();
            $domain_data = json_decode($response->getBody(), 'true');
        }

        $result = array();

        if (array_key_exists('code', $domain_data)){
            if ($domain_data['code']=='NOT_FOUND'){
                $result = [
                    'label'=>'Domain is not purchased',
                    'value'=>'NOT_FOUND'
                ];
            } else {
                $result = [
                    'label'=>$domain_data['message'],
                    'value'=>$domain_data['code']
                ];
            }
        }else{
            $result = [
                'label' => $domain_data['domain'],
                'value'=>$domain_data['status']
            ];
        }


        return response()->json($result);
    }
}
