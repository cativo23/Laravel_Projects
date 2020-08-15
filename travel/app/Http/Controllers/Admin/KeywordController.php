<?php

namespace App\Http\Controllers\Admin;

use App\Cons;
use App\DataTables\ConsDataTable;
use App\Http\Controllers\Controller;
use App\Keyword;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ConsDataTable $dataTable
     * @return Application|Factory|View
     */
    public function index()
    {
        $keywords = Keyword::all();

        return view('keywords.index', compact('keywords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $keywords = Keyword::all();
        return \view('keywords.create', compact('keywords'));
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
            'name'=>'required',
        ]);

        $activity = new Keyword([
            'name' => $request->input('name'),
            'parent_id'=>$request->input('parent_id')
        ]);

        $activity->save();

        return redirect(route('admin.keywords.index'))->with('success', 'Key Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param Cons $cons
     * @return Response
     */
    public function show(Cons $cons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cons $cons
     * @return Application|RedirectResponse|Redirector
     */
    public function edit($id)
    {
        $keywords = Keyword::all();
        $cons = Keyword::find($id);
        return \view('keywords.edit', compact('cons', 'keywords'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'parent_id'=>'required'
        ]);

        $cons = Keyword::find($id);

        $cons->name = $request->input('name');
        $cons->parent_id= $request->input('parent_id');

        $cons->save();
        return redirect(route('admin.keywords.index'))->with('success', 'Activity Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cons $cons
     * @return Response
     */
    public function destroy( $id)
    {
        $destination = Keyword::find($id);
        $destination->delete();
        return redirect()->route('admin.keywords.index')->with('success', 'Destination Deleted Correctly');
    }
}
