<?php

namespace App\Http\Controllers\Admin;

use App\Cons;
use App\DataTables\ConsDataTable;
use App\DataTables\ProDataTable;
use App\Http\Controllers\Controller;
use App\Pro;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ProController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ProDataTable $dataTable
     * @return Application|Factory|View
     */
    public function index(ProDataTable $dataTable)
    {
        return $dataTable->render('pros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view('pros.create');
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
            'text'=>'required',
            'poi_id'=>'required'
        ]);

        $activity = new Pro([
            'text' => $request->input('text'),
            'point_of_interest_id'=>$request->input('poi_id')
        ]);

        $activity->save();

        return redirect(route('admin.pros.index'))->with('success', 'Activity Saved');
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
        $cons = Pro::find($id);
        return \view('pros.edit', compact('cons'));
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
            'text'=>'required',
            'poi_id'=>'required'
        ]);

        $cons = Pro::find($id);

        $cons->text = $request->input('text');
        $cons->point_of_interest_id= $request->input('poi_id');

        $cons->save();
        return redirect(route('admin.pros.index'))->with('success', 'Activity Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cons $cons
     * @return Response
     */
    public function destroy(Cons $cons)
    {
        //
    }
}
