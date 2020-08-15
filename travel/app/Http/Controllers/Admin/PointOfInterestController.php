<?php

namespace App\Http\Controllers\Admin;

use App\ClassFodor;
use App\DataTables\PointOfInterestDataTable;
use App\Http\Controllers\Controller;
use App\PointOfInterest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PointOfInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(PointOfInterestDataTable $dataTable)
    {
        return $dataTable->render('pois.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $classes = ClassFodor::all();
        return view('pois.create', compact('classes'));
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
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'review' => 'required',
            'review_snippet' => 'required',
            'country' => 'required',
            'address_string' => 'required'
        ]);

        $activity = new PointOfInterest([
            'name' => $request->input('name'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'email' => $request->input('email'),
            'web' => $request->input('web'),
            'review' => $request->input('review'),
            'review_snippet' => $request->input('review_snippet'),
            'admission' => $request->input('admission'),
            'card_policy' => $request->input('card_policy'),
            'open_hours' => $request->input('open_hours'),
            'closed_hours' => $request->input('closed_hours'),
            'res_policy' => $request->input('res_policy'),
            'rooms' => $request->input('rooms'),
            'meal_plans' => $request->input('meal_plans'),
            'miscellaneous' => $request->input('miscellaneous'),
            'slug' => Str::slug($request->input('name')),
            'state' => $request->input('state'),
            'zip' => $request->input('zip'),
            'country' => $request->input('country'),
            'metro' => $request->input('metro'),
            'directions' => $request->input('directions'),
            'address_string' => $request->input('address_string'),
            'prefix' => $request->input('prefix'),
            'street_address' => $request->input('street_address'),
            'suffix' => $request->input('suffix'),
            'neighborhood' => $request->input('neighborhood'),
            'city' => $request->input('city')
        ]);

        $activity->save();

        return redirect(route('admin.pois.index'))->with('success', 'POI Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param PointOfInterest $pointOfInterest
     * @return Response
     */
    public function show(PointOfInterest $pointOfInterest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PointOfInterest $pointOfInterest
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $poi = PointOfInterest::find($id);
        $classes = ClassFodor::all();
        return \view('pois.edit',compact('classes', 'poi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PointOfInterest $pointOfInterest
     * @return Response
     */
    public function update(Request $request, PointOfInterest $pointOfInterest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PointOfInterest $pointOfInterest
     * @return Response
     */
    public function destroy(PointOfInterest $pointOfInterest)
    {
        //
    }
}
