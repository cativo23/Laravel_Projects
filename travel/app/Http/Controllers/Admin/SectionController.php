<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Destination;
use App\Hotels;
use App\Http\Controllers\Controller;
use App\Section;
use App\Traits\UploadTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use function view;

class SectionController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $sections = Section::all();

        return view('section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        $articles = Article::all();
        return view('section.create', compact('articles'));
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
            'title' => 'required',
            'text' => 'required',
            'caption' => 'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'article_id'=>'required',
        ]);

        $hotel = new Section([
            'title' => $request->input('title'),
            'text'=> $request->input('text'),
            'caption'=> $request->input('caption'),
            'image'=>'',
            'article_id'=>$request->input('article_id'),
        ]);


        $site_name = env('APP_NAME')."/articles/".$request->input('article_id');
        $hotel = $this->SaveImage($hotel, $request, 'image'  , $site_name);

        $hotel->article_id = $request->input('article_id');

        $hotel->save();

        return redirect(route('admin.sections.index'))->with('success', 'Section Saved Correctly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        $hotel =  Section::find($id);
        $sites = Article::all();
        return view('section.edit',compact('hotel', 'sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'caption' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'article_id'=>'required',
        ]);

        $hotel = Section::find($id);

        $hotel->title = $request->input('title');
        $hotel->text = $request->input('text');
        $hotel->caption = $request->input('caption');
        $site_name = env('APP_NAME')."/articles/".$request->input('article_id');
        $hotel = $this->SaveImage($hotel, $request, 'image'  , $site_name);
        $hotel->article_id = $request->input('article_id');

        $hotel->save();

        return redirect()->route('admin.sections.index')->with('success', 'section Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $hotel =  Section::find($id);
        $hotel->delete();
        return redirect()->route('admin.sections.index')->with('success', 'Section Deleted Correctly');
    }

    private function SaveImage(Section $hotel, Request $request,string $folderName, string $siteName)
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
            $hotel->{$folderName} = $saved_image;
        }

        return $hotel;
    }
}
