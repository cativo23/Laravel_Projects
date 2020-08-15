<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DestinationsDataTable;
use App\Destination;
use App\Gallery;
use App\Hotels;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use App\Overview;
use App\Things2Do;
use App\Traits\UploadTrait;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;
use Str;
use Illuminate\View\View;
use Response;
use GuzzleHttp\Client as GuzzleClient;
use Exception;

class DestinationController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @param DestinationsDataTable $dataTable
     * @return Factory|View
     */
    public function index(DestinationsDataTable $dataTable)
    {
        //In this case we render a Datatable, we use this because the large amount of data
        return $dataTable->render('destinations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $parent = Destination::all();
        $next_fodor_id = Destination::all()->max('fodor_id') +1; //we get the last fodor_id soo next one should be initialize by default
        return view('destinations.create', compact('parent', 'next_fodor_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'parent_id'=>'required',
            'fodor_id' => 'required',
            'image_header' => 'url',
            'image_header_thumbnail' => 'url',
            'hero_video'=>'url',
            'link_external' => 'url',
            'use_t2d' => '',
            'use_bd_btn' => '',
            'use_hotels' => '',
            'use_restaurants' => '',
            'use_gallery' => '',
            'use_viator_t2d' => '',
            'use_experience_more' => '',
            'show_on_parent'=>'',
            'things_title'=>'',
            'things_link'=>'',
            'things_description'=>'',
            'things_image'=>''
        ]);     //TODO: Validate to avoid bad inputs

        $destination = new Destination([
            'slug'=>Str::slug($request->input('title')),
            'name'=> $request->input('title'),
            'fodor_id' => $request->input('fodor_id'),
            'link_external' => $request->input('link_external'),
            'show_on_parent'=> $request->input('show_on_parent')??0,
            'use_t2d' => $request->input('use_t2d') ?? 0,
            'use_bd_btn' => $request->input('use_bd_btn') ?? 0,
            'use_hotels' => $request->input('use_hotels') ?? 0,
            'use_restaurants' => $request->input('use_restaurants') ?? 0,
            'use_gallery' => $request->input('use_gallery') ?? 0,
            'use_viator_t2d' => $request->input('use_viator_t2d') ?? 0,
            'use_xperience_more' => $request->input('use_experience_more') ?? 0,
            'image_header' => $request->input('image_header'),
            'image_header_thumbnail' => $request->input('image_header_thumbnail'),
            'logo' => $request->input('logo'),
            'logo_sticky' => $request->input('logo_sticky'),
            'hero_video' => $request->input('hero_video'),
            'email'=> $request->input('email'),
            'is_available'=>1
        ]);

        $parent = Destination::firstWhere('fodor_id', $request->input('site_id'));

        if($parent){
            $destination->parent_id = $parent->fodor_id;
            $destination->sequence = count($parent->children())+1;
        }else{
            $destination->parent_id = null;
            $destination->sequence = 0;
        }

        $destination->save();

        $intro_text = $request->get('intro_text');

        $overview = new Overview([
            'text'=> $intro_text,
            'snippet'=>$this->GetIntroSnippet($intro_text), //Used to get the snippet text
        ]);

        $overview->destination_id = $destination->id;

        $overview->save();

        $dad = Str::slug($destination->dad()->name ?? $destination->name); //we get the dad name to use it as folder name

        $site_name = env('APP_NAME')."/".$dad."/".Str::slug($destination->name);

        $things_title = $request->input('things_title');
        $things_link = $request->input('things_link');
        $things_description = $request->input('things_description');
        $things_image =$request->file('things_image');

        if ($things_image){  //TODO: improve the next lines of code, they are the same as update
            for($i =0; $i < count($things_title);$i++){
                $thing2do = new Things2Do([
                    'title'=>$things_title[$i],
                    'intro'=>$things_description[$i],
                    'link'=>$things_link[$i],
                    'place'=>$destination->name,
                ]);

                $thing2do->destination_id = $destination->id;

                $thing2do = $this->SaveImageThings($thing2do, $things_image[$i], 'image',  $site_name);

                $thing2do->save();
            }
        }


        $hotels_title = $request->input('hotels_title');
        $hotels_link = $request->input('hotels_link');
        $hotels_image =$request->file('hotels_image');

        if ($hotels_image){
            for($i =0; $i < count($hotels_title);$i++){
                $hotel = new Hotels([
                    'name'=>$hotels_title[$i],
                    'image'=>$hotels_image[$i],
                    'link'=>$hotels_link[$i],
                ]);

                $hotel->destination_id = $destination->id;

                $hotel = $this->SaveImageHotels($hotel, $hotels_image[$i], 'image',  $site_name);

                $hotel->save();
            }
        }

        $gallery_name = $request->input('gallery_title');
        $images =  $request->file('image_gallery');
        $captions = $request->input('caption_image');

        if ($gallery_name){
            $gallery = new Gallery([
                'name'=>$gallery_name,
            ]);

            $gallery->destination_id = $destination->id;

            $gallery->save();
        }

        if ($images){
            for($i =0; $i < count($images);$i++) {
                $image = new ImageGallery([
                    'title' => $captions[$i],
                ]);

                $image->gallery_id = $gallery->id;

                $image = $this->SaveImageGallery($image, $images[$i], 'image', $site_name);
                $image->save();
            }
        }

        $ready =  $this->CheckDestinationCompleted($destination);

        if ($ready){
            $destination->is_available = true;
        }else{
            $destination->is_available = false;
        }

        $destination->save();

        // Updating DNS record if user owns the domain
       //$this->updateDnsRecord($destination->link_external);

        $updateApacheConfig = $request->input('update_apache_configuration') ?? 0;
        if($updateApacheConfig) {
            $this->addApacheConfig($destination);
        }

        return redirect(route('admin.destinations.index'))->with(['success'=>'Destination Saved Correctly!', 'destination_art'=>$destination->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $sites = Destination::all();
        $destination = Destination::find($id);
        $purchased = $this->checkPurchased($destination->link_external);

        return \view('destinations.edit', compact('sites', 'destination', 'purchased'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, $id)
    {
        dd($request);
        $request->validate([
            'title'=> 'required',
            'site_id'=>'',
            'image_header' => '',
            'image_header_thumbnail' => '',
            'hero_video'=>'',
            'link_external' => '',
            'use_t2d' => '',
            'use_bd_btn' => '',
            'use_hotels' => '',
            'use_restaurants' => '',
            'use_gallery' => '',
            'use_viator_t2d' => '',
            'use_experience_more' => '',
            'show_on_parent'=>'',
            'things_title'=>'',
            'things_link'=>'',
            'things_description'=>'',
            'things_image'=>'',
            'gallery_title'=>'required',
        ]);

        $destination = Destination::find($id);
        // Current slug
        $currentSlug = $destination->slug;
        $parent = Destination::where('fodor_id', '=', $request->input('site_id'))->first();

        $destination->name = $request->input('title');
        if($parent){
            $destination->parent_id = $parent->fodor_id;
        }
        $destination->link_external =  $request->input('link_external');
        $destination->email = $request->input('email');
        $destination->sequence =  $request->input('sequence')??0;
        $overview = $destination->overview;
        $overview->text= $request->input('intro_text');
        $overview->save();
        $destination->image_header = $request->input('image_header');
        $destination->image_header_thumbnail = $request->input('image_header_thumbnail');
        $destination->logo = $request->input('logo');
        $destination->logo_sticky = $request->input('logo_sticky');
        $destination->hero_video = $request->input('hero_video');
        $destination->show_on_parent = $request->input('show_on_parent')??0;
        $destination->use_t2d = $request->input('use_t2d') ?? 0;
        $destination->use_bd_btn = $request->input('use_bd_btn') ?? 0;
        $destination->use_hotels = $request->input('use_hotels') ?? 0;
        $destination->use_restaurants = $request->input('use_restaurants') ?? 0;
        $destination->use_gallery = $request->input('use_gallery') ?? 0;
        $destination->use_viator_t2d = $request->input('use_viator_t2d') ?? 0;
        $destination->use_xperience_more = $request->input('use_experience_more') ?? 0;



        $destination->save();

        $things_title_view = $request->input('things_title');
        $things_intro_view = $request->input('things_description');
        $things_link_view = $request->input('things_link');
        $things_image_view = $request->file('things_image');

        $dad = Str::slug($destination->dad()->name ?? $destination->name);
        $site_name = env('APP_NAME')."/".$dad."/".Str::slug($destination->name);

        $things =  $destination->things2Do;

        for ($i=0; $i<count($things); $i++){
            if (array_key_exists($things[$i]->id, $things_title_view)){
                $things[$i]->title = $things_title_view[$things[$i]->id];
                $things[$i]->intro = $things_intro_view[$things[$i]->id];
                $things[$i]->link = $things_link_view[$things[$i]->id];
                $things[$i]->place = $destination->name;
                $things[$i]->destination_id = $destination->id;

                if ($things_image_view!=null)
                    $things[$i] = $this->SaveImageThings($things[$i], $things_image_view[$things[$i]->id], 'image',  $site_name);

                $things[$i]->save();

            }else{
                $things[$i]->delete();
            }
        }

        $hotels_name_view = $request->input('hotels_title');
        $hotels_link_view = $request->input('hotels_link');
        $hotels_image_view = $request->file('hotels_image');
        $hotels =  $destination->hotels;

        for ($i=0; $i <count($hotels); $i++){
            if (array_key_exists($hotels[$i]->id, $hotels_name_view)){
                $hotels[$i]->name = $hotels_name_view[$hotels[$i]->id];
                $hotels[$i]->link = $hotels_link_view[$hotels[$i]->id];
                $hotels[$i]->destination_id = $destination->id;

                if ($hotels_image_view !=null)
                    $hotels[$i] = $this->SaveImageHotels($hotels[$i], $hotels_image_view[$hotels[$i]->id], 'image',  $site_name);

                $hotels[$i]->save();
            }else{
                $hotels[$i]->delete();
            }
        }

        if (count($destination->galleries)>0){
            $gallery = $destination->galleries[0];
            $images = $gallery->images;

            $gallery_title = $request->input('gallery_title');
            $gallery->name = $gallery_title;
            $gallery->save();

            $image_caption_view = $request->input('caption_image');
            $image_view = $request->file('image_gallery');

            for ($i=0; $i <count($images); $i++){
               if($image_caption_view !=null){
                   if (array_key_exists($i, $image_caption_view)){
                       $images[$i]->title = $image_caption_view[$i];

                       if ($image_view !=null)
                           $images[$i] = $this->SaveImageGallery($images[$i], $image_view[$i], 'image',  $site_name);

                       $images[$i]->save();
                   }else{
                       $images[$i]->delete();
                   }
               }
            }

            $images_new =  $request->file('image_gallery_new');
            $captions_new = $request->input('caption_image_new');

            if ($images_new){
                for($i =0; $i < count($images_new);$i++) {
                    $image = new ImageGallery([
                        'title' => $captions_new[$i],
                    ]);

                    $image->gallery_id = $gallery->id;

                    $image = $this->SaveImageGallery($image, $images_new[$i], 'image', $site_name);
                    $image->save();
                }
            }
        }else{
            $gallery_name = $request->input('gallery_title');

            if ($gallery_name){
                $gallery = new Gallery([
                    'name'=>$gallery_name,
                ]);

                $gallery->destination_id = $destination->id;

                $gallery->save();
            }

            $images_new =  $request->file('image_gallery_new');
            $captions_new = $request->input('caption_image_new');

            if ($images_new){
                for($i =0; $i < count($images_new);$i++) {
                    $image = new ImageGallery([
                        'title' => $captions_new[$i],
                    ]);

                    $image->gallery_id = $gallery->id;

                    $image = $this->SaveImageGallery($image, $images_new[$i], 'image', $site_name);
                    $image->save();
                }
            }
        }

        $things_title_new = $request->input('things_title_new');
        $things_link_new = $request->input('things_link_new');
        $things_description_new= $request->input('things_description_new');
        $things_image_new =$request->file('things_image_new');
        if($things_title_new){
            for($i =0; $i < count($things_title_new);$i++){
                $thing2do = new Things2Do([
                    'title'=>$things_title_new[$i],
                    'intro'=>$things_description_new[$i],
                    'link'=>$things_link_new[$i],
                    'place'=>$destination->name,
                ]);

                $thing2do->destination_id = $destination->id;

                $thing2do = $this->SaveImageThings($thing2do, $things_image_new[$i], 'image',  $site_name);

                $thing2do->save();
            }
        }


        $hotels_title_new = $request->input('hotels_title_new');
        $hotels_link_new = $request->input('hotels_link_new');
        $hotels_image_new =$request->file('hotels_image_new');
        if($hotels_title_new){
            for($i =0; $i < count($hotels_title_new);$i++){
                $hotel = new Hotels([
                    'name'=>$hotels_title_new[$i],
                    'image'=>$hotels_image_new[$i],
                    'link'=>$hotels_link_new[$i],
                ]);

                $hotel->destination_id = $destination->id;

                $hotel = $this->SaveImageHotels($hotel, $hotels_image_new[$i], 'image',  $site_name);

                $hotel->save();
            }
        }

        $images_new =  $request->file('image_gallery_new');
        $captions_new = $request->input('caption_image_new');

        if($images_new){
            for($i =0; $i < count($images_new);$i++) {
                $image = new ImageGallery([
                    'title' => $captions_new[$i],
                ]);

                $image->gallery_id = $gallery->id;

                $image = $this->SaveImageGallery($image, $images_new[$i], 'image', $site_name);
                $image->save();
            }
        }

        // Updating DNS record if user owns the domaing
        /*$this->updateDnsRecord($destination->link_external);*/

        $updateApacheConfig = $request->input('update_apache_configuration') ?? 0;
        if($updateApacheConfig) {
            $this->updateApacheConfig($destination, $currentSlug);
        }

        $ready =  $this->CheckDestinationCompleted($destination);

        if ($ready){
            $destination->is_available = true;
        }else{
            $destination->is_available = false;
        }
        $destination->save();

        return redirect()->route('admin.destinations.index')->with(['success'=>'Destination Updated Correctly!', 'destination_art'=>$destination->id]);
    }

    private function updateDnsRecord($url) {
        $purchased = $this->checkPurchased($url);
        if($purchased['is_purchased'] == true) {
            $parse = parse_url($url);
            $domain = $parse['host'];
            $auth = "sso-key " . config('app.godaddyKey', '');
            $headers = [
                'Authorization'=>$auth
            ];
            $client = new GuzzleClient(['headers'=>$headers]);
            $ip = config('app.serverIp', '54.147.197.236');
            $client->put("https://api.godaddy.com/v1/domains/$domain/records/A/@", [
               'json' => array([
                   'data' => $ip,
                   'name' => '@',
                   'ttl' => 3600,
                   'type' => 'A'
               ])
            ]);
        }
    }

    private function checkPurchased($url) {
        if($url == '') {
            return  [
                'is_purchased' => false,
                'message' => "You have not purchased a domain for this destination."
            ];
        }
        $parse = parse_url($url);
        $domain = $parse['host'];
        $auth = "sso-key " . config('app.godaddyKey', '');
        $headers = [
            'Authorization'=>$auth
        ];
        $client = new GuzzleClient(['headers'=>$headers]);
        $domain_data = array();

        try {
            $response= $client->request('GET', "https://api.godaddy.com/v1/domains/$domain");
            $domain_data = json_decode($response->getBody(), 'true');
        }catch (ClientException $e){
            $response = $e->getResponse();
            $domain_data = json_decode($response->getBody(), 'true');
        }
        if (array_key_exists('code', $domain_data)){
            return [
                'is_purchased' => false,
                'message' => "The domain $domain is not purchased."
            ];
        } else {
            return [
                'is_purchased' => true,
                'message' => "The domain $domain is purchased."
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        $destination = Destination::find($id);
        if ($destination->overview){
            $destination->overview->delete();
        }
        if (count($destination->things2Do)){
            $destination->things2Do->each->delete();
        }
        if (count($destination->hotels)){
            $destination->hotels->each->delete();
        }
        if ($destination->articles){
            if (count($destination->articles)>0){
                foreach ($destination->articles as $article){
                    $article->sections->each->delete();
                    $article->delete();
                }
            }
        }

        if ($destination->galleries){
            foreach ($destination->galleries as $gallery){
                $gallery->images->each->delete();
            }

            $destination->galleries->each->delete();
        }
        $delete = $destination->delete();
        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Destination deleted successfully";
        } else {
            $success = true;
            $message = "Destination not found";
        }

        //  Return response
        return response()->json([
        'success' => $success,
        'message' => $message,
    ]);
    }

    public function edit2($destination){
        $parent = Destination::all();
        return view('destinations.create2', compact('parent'));
    }

    public function header_image_upload(Request $request){

       $request->validate([
           'file'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

        try {
            if ($request->hasFile('file')) {

                $url  = $this->SaveImageNew($request, 'header_image');

                return Response::json([
                    'status'=>'success',
                    'path'=> $url
                ], 200);
            }else{
                return Response::json('error', 400);
            }
        }
        catch (Exception $e){
            return Response::json('error', 400);
        }
    }

    public function video_upload(Request $request){

        $request->validate([
            'file'=>'mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        ]);

        try {
            if ($request->hasFile('file')) {

                $url  = $this->SaveVideoNew($request, 'hero_video');

                return Response::json([
                    'status'=>'success',
                    'path'=> $url
                ], 200);
            }else{
                return Response::json('error', 400);
            }
        }
        catch (Exception $e){
            return Response::json('error', 400);
        }
    }


    private function SaveImage(Destination $destination, Request $request, string $folderName, string $siteName)
    {
        // Check if a profile image has been uploaded
        if ($request->has($folderName)) {
            // Get image file
            $image = $request->file($folderName);
            // Make a image name based on user name and current timestamp
            $name = Str::slug($image->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/images/' . $siteName . '/' . $folderName;
            // Upload image
            $saved_image = $this->uploadOne($image, $folder, 's3', $name);
            // Set user profile image path in database to filePath
            $destination->{$folderName} = $saved_image;
        }

        return $destination;
    }

    private function SaveImageThings(Things2Do $destination, UploadedFile $image, string $folderName, string $siteName)
    {
        // Check if a profile image has been uploaded
        if ($image) {
            // Make a imag
            //e name based on user name and current timestamp
            $name = Str::slug($image->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/images/' . $siteName . '/' . $folderName;
            // Upload image
            $saved_image = $this->uploadOne($image, $folder, 's3', $name);
            // Set user profile image path in database to filePath
            $destination->{$folderName} = $saved_image;
        }

        return $destination;
    }

    private function SaveImageHotels(Hotels $destination, UploadedFile $image, string $folderName, string $siteName)
    {
        // Check if a profile image has been uploaded
        if ($image) {
            // Make a imag
            //e name based on user name and current timestamp
            $name = Str::slug($image->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/images/' . $siteName . '/' . $folderName;
            // Upload image
            $saved_image = $this->uploadOne($image, $folder, 's3', $name);
            // Set user profile image path in database to filePath
            $destination->{$folderName} = $saved_image;
        }

        return $destination;
    }

    private function SaveImageGallery(ImageGallery $destination, UploadedFile $image, string $folderName, string $siteName)
    {
        // Check if a profile image has been uploaded
        if ($image) {
            // Make a imag
            //e name based on user name and current timestamp
            $name = Str::slug($image->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/images/' . $siteName . '/' . $folderName;
            // Upload image
            $saved_image = $this->uploadOne($image, $folder, 's3', $name);
            // Set user profile image path in database to filePath
            $destination->{$folderName} = $saved_image;
        }

        return $destination;
    }

    private function SaveImageNew(Request $request, string $filename)
    {
        // Check if a profile image has been uploaded
        if ($request->has('file')) {
            // Get image file
            $image = $request->file('file');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($image->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/images/' . $filename;
            // Upload image
            $saved_image = $this->uploadOne($image, $folder, 's3', $name);
            // Set user profile image path in database to filePath
             return $saved_image;
        }

        return null;
    }

    private function SaveVideo(Destination $destination, Request $request, string $folderName, string $siteName)
    {
        // Check if a profile image has been uploaded
        if ($request->has($folderName)) {
            // Get image file
            $video = $request->file($folderName);
            // Make a image name based on user name and current timestamp
            $name = Str::slug($video->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/videos/' . $siteName . '/' . $folderName;
            // Upload image
            $saved_video = $this->uploadOne($video, $folder, 's3', $name);
            // Set user profile image path in database to filePath
            $destination->{$folderName} = $saved_video;
        }

        return $destination;
    }

    public function GetIntroSnippet(string $intro_text)
    {
        $max_length = 340;
        $intro_snip = $intro_text;

        $first = strstr($intro_snip, '<p>');
        $second = strstr($first, '</p>');
        $intro_snip = str_replace($second, "", $first);
        $intro_snip = str_replace('<p>', "", $intro_snip);
        $intro_snip = strip_tags($intro_snip);

        if (strlen($intro_snip) > $max_length)
        {
            $intro_snip = substr($intro_snip, 0, 337) . '...';
        }

        return $intro_snip;
    }

    private function SaveVideoNew(Request $request, string $folderName)
    {
        // Check if a profile image has been uploaded
        if ($request->has('file')) {
            // Get image file
            $video = $request->file('file');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($video->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/videos/' . $folderName;
            // Upload image
            $saved_video = $this->uploadOne($video, $folder, 's3', $name);
            // Set user profile image path in database to filePath
            return $saved_video;
        }

        return null;
    }

    private function updateApacheConfig(Destination $destination, string $currentSlug) {
        $apacheConfigNode = config("app.apacheConfigNode", "");

        $token = config("app.apacheSettingsApiKey", "");
        $auth = "Bearer $token";
        $headers = [
            'Authorization'=>$auth
        ];
        $client = new GuzzleClient(['headers'=>$headers]);
        // Si el destino no tiene URL finalizar la operación
        if($destination->link_external == null) {
            return response()->json([
                'error' => 'Destination does not have url'
            ]);
        }
        // Asumir que es un child site
        $parent = new Destination();
        try {
            $parent = $destination->dad();
        }catch(Exception $e) {
            error_log($e->getMessage());
        }
        // Obtener el grand parent site
        $grandParent = new Destination();
        try {
            $grandParent = $parent->dad();
        }catch(Exception $e){
            error_log($e->getMessage());
        }
        // 1. Si el parent no tiene link external asumir que es grand parent site
        // En el caso del grand parent, por ejemplo USAXpertz o EuropeXpertz no se hace nada
        if($parent->link_external == null) {
            return 0;
        }else {
            // 2. Si el parent tiene link external verificar si el grand parent tiene link external
            if($grandParent->link_external == null) {
                // 2.1 Si no tiene link external el grand parent entonces es un parent site
                //$currentSlug = $destination->slug;
                $slug =$destination->slug;

                // Domain
                $parse = parse_url($destination->link_external);
                $domain = $parse['host'];

                // Parent site domain
                $parse = parse_url($parent->link_external);
                $parentSiteDomain = $parse['host'];
                //$command = "node $apacheConfigNode update --currentSlug $currentSlug --slug $slug --domain $domain --parentSiteDomain $parentSiteDomain --isChildSite false 2&>1";
                //exec($command, $out, $err);

                $client->put("http://$parentSiteDomain:3000/api/v1/sites/$currentSlug", [
                    'json'=>[
                        'slug'=>$slug,
                        'domain'=>$domain,
                        'parentSiteDomain'=>$parentSiteDomain,
                        'isChildSite'=>false
                    ]
                ]);
                return 1;
            } else {
                // 2.2 Si tiene link external entonces es un child site
                //$currentSlug = $destination->slug;
                $slug =$destination->slug;

                // Domain
                $parse = parse_url($destination->link_external);
                $domain = $parse['host'];

                // Parent site domain
                $parse = parse_url($grandParent->link_external);
                $parentSiteDomain = $parse['host'];

                $destinationSlug = $parent->slug;

                //$command = "node $apacheConfigNode update --currentSlug $currentSlug --slug $slug --domain $domain --parentSiteDomain $parentSiteDomain --isChildSite true --destinationSlug $destinationSlug 2>&1";
                //exec($command, $out, $err);

                $client->put("http://$parentSiteDomain:3000/api/v1/sites/$currentSlug", [
                    'json'=>[
                        'slug'=>$slug,
                        'domain'=>$domain,
                        'parentSiteDomain'=>$parentSiteDomain,
                        'isChildSite'=>true,
                        'destinationSlug'=>$destinationSlug
                    ]
                ]);
                return 1;
            }
        }
    }

    private function addApacheConfig(Destination $destination) {

        $apacheConfigNode = config("app.apacheConfigNode", "");
        $token = config("app.apacheSettingsApiKey", "");
        $auth = "Bearer $token";
        $headers = [
            'Authorization'=>$auth
        ];
        $client = new GuzzleClient(['headers'=>$headers]);
        // Si el destino no tiene URL finalizar la operación
        if($destination->link_external == null) {
            return 0;
        }
        // Asumir que es un child site
        $parent = new Destination();
        try {
            $parent = $destination->dad();
        }catch(Exception $e) {
            error_log($e->getMessage());
        }
        // Obtener el grand parent site
        $grandParent = new Destination();
        try {
            $grandParent = $parent->dad();
        }catch(Exception $e){
            error_log($e->getMessage());
        }
        // 1. Si el parent no tiene link external asumir que es grand parent site
        // En el caso del grand parent, por ejemplo USAXpertz o EuropeXpertz no se hace nada
        if($parent->link_external == null) {
            return 0;
        }else {
            // 2. Si el parent tiene link external verificar si el grand parent tiene link external
            if($grandParent->link_external == null) {
                // 2.1 Si no tiene link external el grand parent entonces es un parent site
                //$currentSlug = $destination->slug;
                $slug =$destination->slug;

                // Domain
                $parse = parse_url($destination->link_external);
                $domain = $parse['host'];

                // Parent site domain
                $parse = parse_url($parent->link_external);
                $parentSiteDomain = $parse['host'];
                //$command = "node $apacheConfigNode add --slug $slug --domain $domain --parentSiteDomain $parentSiteDomain --isChildSite false 2&>1";
                //exec($command, $out, $err);
                $client->post("http://$parentSiteDomain:3000/api/v1/sites", [
                    'json'=>[
                        'slug'=>$slug,
                        'domain'=>$domain,
                        'parentSiteDomain'=>$parentSiteDomain,
                        'isChildSite'=>false
                    ]
                ]);
                return 1;
            } else {
                // 2.2 Si tiene link external entonces es un child site
                //$currentSlug = $destination->slug;
                $slug =$destination->slug;

                // Domain
                $parse = parse_url($destination->link_external);
                $domain = $parse['host'];

                // Parent site domain
                $parse = parse_url($grandParent->link_external);
                $parentSiteDomain = $parse['host'];

                $destinationSlug = $parent->slug;

                //$command = "node $apacheConfigNode add --slug $slug --domain $domain --parentSiteDomain $parentSiteDomain --isChildSite true --destinationSlug $destinationSlug 2>&1";
                //exec($command, $out, $err);
                $client->post("http://$parentSiteDomain:3000/api/v1/sites", [
                    'json'=>[
                        'slug'=>$slug,
                        'domain'=>$domain,
                        'parentSiteDomain'=>$parentSiteDomain,
                        'isChildSite'=>true,
                        'destinationSlug'=>$destinationSlug
                    ]
                ]);
                return 1;
            }
        }
    }

    /**
     * Check if the created/updated destination is ready to be available
     * @param Destination $destination
     * @return bool
     */
    private function CheckDestinationCompleted(Destination $destination){

        if (count($destination->things2Do)>0 && count($destination->hotels)>0 && count($destination->galleries)>0 && $destination->name && $destination->fodor_id && $destination->logo && $destination->logo_sticky  && $destination->hero_video  && $destination->email  && $destination->rest_areas  && $destination->slug){
            $ready=true;
        }else{
            $ready =  false;
        }

        if ($destination->parent){
            if ($destination->image_header && $destination->image_header_thumbnail && $destination->link_external){
                $ready=true;
            }else{
                $ready =  false;
            }
        }

        return $ready;
    }
}
