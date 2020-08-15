<?php

namespace App\Http\Controllers\Admin;

use App\Cons;
use App\DataTables\ConsDataTable;
use App\Http\Controllers\Controller;
use App\PointOfInterest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ConsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ConsDataTable $dataTable
     * @return Application|Factory|View
     */
    public function index(ConsDataTable $dataTable)
    {
        return $dataTable->render('cons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view('cons.create');
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

        $activity = new Cons([
            'text' => $request->input('text'),
            'point_of_interest_id'=>$request->input('poi_id')
        ]);

        $activity->save();

        return redirect(route('admin.cons.index'))->with('success', 'Activity Saved');
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
        $cons = Cons::find($id);
        return \view('cons.edit', compact('cons'));
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

        $cons = Cons::find($id);

        $cons->text = $request->input('text');
        $cons->point_of_interest_id= $request->input('poi_id');

        $cons->save();
        return redirect(route('admin.cons.index'))->with('success', 'Activity Saved');
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
