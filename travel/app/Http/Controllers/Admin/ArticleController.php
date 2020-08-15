<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Article;
use App\Destination;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use App\Section;
use App\Traits\UploadTrait;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;
use function Complex\sec;

class ArticleController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $sites = Destination::all();
        return view('articles.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text'=>'required',
            'type'=>'required',
            'quote'=>'required',
            'image'=>'required',
            'destination_id'=>'required',
        ]);

        $image = new Article([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'quote' => $request->input('quote'),
            'slug' => \Str::Slug( $request->input('title')),
            'type'=> $request->input('type'),
            'image'=>$request->input('image'),
            'destination_id'=>$request->input('destination_id'),
        ]);

        $destination = Destination::find($request->input('destination_id'));

        $site_name = env('APP_NAME').DIRECTORY_SEPARATOR.$destination->name;

        $image->destination_id= $request->input('destination_id');

        $image->save();

        $article_titles = $request->input('article_titles');
        $article_captions = $request->input('article_captions');
        $article_images= $request->file('article_images');
        $article_texts = $request->input('article_texts');

        for($i=0;$i<count($article_titles);$i++){
            $section = new Section([
                'title' => $article_titles[$i],
                'text'=> $article_texts[$i],
                'caption'=> $article_captions[$i],
                'image'=>'',
            ]);

            $section->article_id = $image->id;

            $site_name = env('APP_NAME')."/articles/".$image->id;
            $section = $this->SaveImageSection($section, $article_images[$i], 'image'  , $site_name);

            $section->save();
        }

        return redirect(route('admin.articles.index'))->with('success', 'Article Saved Correctly!');
    }

    /**
     * Display the specified resource.
     *
     * @param Activity $activity
     * @return Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Article $article)
    {
        $sites = Destination::all();
        return \view('articles.edit',compact('sites', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'text'=>'required',
            'type'=>'required',
            'quote'=>'required',
            'image'=>'',
            'destination_id'=>'required',
        ]);

        $article = Article::find($id);

        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));
        $article->type = $request->input('type');
        $article->text = $request->input('text');
        $article->quote = $request->input('quote');
        $article->destination_id = $request->input('destination_id');

        $destination = Destination::find($request->input('destination_id'));

        $site_name = env('APP_NAME');

        $article->image = $request->input('image')?? $article->image;

        $article->destination_id= $request->input('destination_id');

        $article->save();

        $article_titles = $request->input('article_titles');
        $article_captions = $request->input('article_captions');
        $article_images= $request->file('article_images');
        $article_texts = $request->input('article_texts');
        $sections = $article->sections;

        for($i=0;$i<count($sections);$i++){
            if ($article_titles){
                if (array_key_exists($sections[$i]->id, $article_titles)){
                    $sections[$i]->title = $article_titles[$sections[$i]->id];
                    $sections[$i]->caption = $article_captions[$sections[$i]->id];
                    $sections[$i]->text = $article_texts[$sections[$i]->id];


                    $site_name = env('APP_NAME')."/articles/".$article->id;

                    if ($article_images !=null){
                        $sections[$i]->image = $this->SaveImageSection($sections[$i], $article_images[$sections[$i]->id], 'image', $site_name);
                    }

                    $sections[$i]->save();
                }
            }
            else{
                $sections[$i]->delete();
            }
        }

        $article_titles_new = $request->input('article_titles_new');
        $article_captions_new = $request->input('article_captions_new');
        $article_images_new= $request->file('article_images_new');
        $article_texts_new = $request->input('article_texts_new');
        for($i =0; $i < count($article_titles_new);$i++){
            $hotel = new Section([
                'title'=>$article_titles_new[$i],
                'caption'=>$article_captions_new[$i],
                'text'=>$article_texts_new[$i],
            ]);

            $hotel->article_id = $article->id;

            $hotel = $this->SaveImageSection($hotel, $article_images_new[$i], 'image',  $site_name);

            $hotel->save();
        }


        return redirect(route('admin.articles.index'))->with('success', 'Image Saved Correctly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $activity
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($arcticle_id)
    {
        $activity = Article::find($arcticle_id);
        $images = $activity->sections;
        if ($images){
            if (is_array($images)){
                $images->each->delete();
            }else{
                $images->each->delete();
            }
        }
        $activity->delete();
        return redirect()->route('admin.articles.index')->with('succes', 'Article Deleted Correctly');
    }

    public function create_with_dest($destination_id){
        $destination = Destination::find($destination_id);

        return view('articles.create2', compact('destination'));
    }

    public function store_with_dest(Request $request, $destination_id){

        $request->validate([
            'title' => 'required',
            'text'=>'required',
            'type'=>'required',
            'quote'=>'required',
            'image'=>'required',
        ]);

        $image = new Article([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'quote' => $request->input('quote'),
            'slug' => \Str::Slug( $request->input('title')),
            'type'=> $request->input('type'),
            'image'=>$request->input('image'),
            'destination_id'=>$destination_id
        ]);

        $destination = Destination::find($destination_id);

        $site_name = env('APP_NAME').DIRECTORY_SEPARATOR.$destination->name;


        $image->save();

        $article_titles = $request->input('article_titles');
        $article_captions = $request->input('article_captions');
        $article_images= $request->file('article_images');
        $article_texts = $request->input('article_texts');

        for($i=0;$i<count($article_titles);$i++){
            $section = new Section([
                'title' => $article_titles[$i],
                'text'=> $article_texts[$i],
                'caption'=> $article_captions[$i],
                'image'=>'',
            ]);

            $section->article_id = $image->id;

            $site_name = env('APP_NAME')."/articles/".$image->id;
            $section = $this->SaveImageSection($section, $article_images[$i], 'image'  , $site_name);

            $section->save();
        }

        return redirect(route('admin.articles.index'))->with('success', 'Article Saved Correctly!');
    }

    private function SaveImage(Article $imageGallery, Request $request, string $folderName, string $siteName)
    {
        // Check if a profile image has been uploaded
        if ($request->has($folderName)) {
            // Get image file
            $image = $request->file($folderName);
            // Make a image name based on user name and current timestamp
            $name = Str::slug($image->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/images/articles/' . $siteName . '/' . $folderName;
            // Upload image
            $saved_image = $this->uploadOne($image, $folder, 's3', $name);
            // Set user profile image path in database to filePath
            $imageGallery->{$folderName} = $saved_image;
        }

        return $imageGallery;
    }

    private function SaveImageSection(Section $hotel, UploadedFile $image,string $folderName, string $siteName)
    {
        // Check if a profile image has been uploaded
        if ($image) {
            // Make a image name based on user name and current timestamp
            $name = Str::slug($image->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/images/' . $siteName . '/' . $folderName;
            // Upload image
            $saved_image = $this->uploadOne($image, $folder, 's3', $name);
            // Set user profile image path in database to filePath
            $hotel->{$folderName} = $saved_image;
        }

        return $hotel;
    }
}
