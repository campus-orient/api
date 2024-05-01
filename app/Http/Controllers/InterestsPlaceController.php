<?php

namespace App\Http\Controllers;

use App\Http\Resources\InterestsPlaceCollection;
use App\Models\InterestsPlace;
use App\Http\Requests\StoreInterestsPlaceRequest;
use App\Http\Requests\UpdateInterestsPlaceRequest;

class InterestsPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return response()->json([
                'interestsPlaces' => new InterestsPlaceCollection(InterestsPlace::all())
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInterestsPlaceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InterestsPlace $interestsPlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InterestsPlace $interestsPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInterestsPlaceRequest $request, InterestsPlace $interestsPlace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InterestsPlace $interestsPlace)
    {
        //
    }
}
