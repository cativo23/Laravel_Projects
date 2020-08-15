<?php

namespace App\Http\Controllers;

use App\Link;
use Auth;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $user = Auth::user();

        $links = $user->links;

        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('links.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'string'],
            'url'=>['required', 'url']
        ]);

        $user = Auth::user();

        $link = new Link([
            'name'=> $request->input('name'),
            'url'=>$request->input('url'),
            'user_id'=>$user->id,
        ]);

        $link->save();

        return redirect()->route('links.index')->with('status', 'Link Added Correctly!');
    }

    /**
     * Display the specified resource.
     *
     * @param Link $link
     * @return Application|Factory|Response|View
     */
    public function show(Link $link)
    {
        return view('links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Link $link
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit(Link $link)
    {
        return view('links.update', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Link $link
     * @return RedirectResponse
     */
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'name'=>['required', 'string'],
            'url'=>['required', 'url']
        ]);

        $link->name= $request->input('name');
        $link->url = $request->input('url');

        $link->save();

        return redirect()->route('links.index')->with('status', 'Link Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Link $link
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return redirect()->route('links.index')->with('status', 'Link, removed');
    }
}
