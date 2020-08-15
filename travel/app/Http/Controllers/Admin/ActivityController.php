<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\DataTables\ActivitiesDataTable;
use App\Destination;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ActivitiesDataTable $dataTable
     * @return Application|Factory|View
     */
    public function index(ActivitiesDataTable $dataTable)
    {
        return $dataTable->render('activity.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $destinations = Destination::all();
        return view('activity.create', compact('destinations'));
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
            'title'=>'required',
            'text'=>'required',
            'snippet'=>'required'
        ]);

        $activity = new Activity([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'snippet'=> $request->input('snippet'),
            'destination_id'=>$request->input('site_id')
        ]);

        $activity->save();

        return redirect(route('admin.activities.index'))->with('success', 'Activity Saved');
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
     * @param Activity $activity
     * @return Application|Factory|View
     */
    public function edit(Activity $activity)
    {
        $activity_send = $activity;
        $destinations = Destination::all();
        return \view('activity.edit',compact('destinations', 'activity_send'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Activity $activity
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title'=>'required',
            'text'=>'required',
            'snippet'=>'required'
        ]);

        $activity->title = $request->input('title');
          $activity->text = $request->input('text');
        $activity->snippet= $request->input('snippet');
        $activity->destination_id=$request->input('site_id');

        $activity->save();

        return redirect(route('admin.activities.index'))->with('success', 'Activity Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Activity $activity
     * @return Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
