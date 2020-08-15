<?php

namespace App\Http\Controllers\Admin;

use App\BestForType;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BestForTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $best_for_types = BestForType::all();

        return view('bestfortypes.index', compact('best_for_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view('bestfortypes.create');
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
            'name' => 'required',
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'best_for_types'");
        $nextId = $statement[0]->Auto_increment;

        $best = new BestForType([
            'name' => $request->input('name'),
            'fodor_id'=>$nextId
        ]);

        $best->save();

        return redirect()->route('admin.best-for-types.index')->with('success', 'Best For Type Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param BestForType $bestForType
     * @return Response
     */
    public function show(BestForType $bestForType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BestForType $bestForType
     * @return Response
     */
    public function edit(BestForType $bestForType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BestForType $bestForType
     * @return Response
     */
    public function update(Request $request, BestForType $bestForType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BestForType $bestForType
     * @return Response
     */
    public function destroy(BestForType $bestForType)
    {
        //
    }
}
