<?php

namespace App\Http\Controllers;

use App\Http\Resources\InterestsPlaceCollection;
use App\Http\Resources\InterestsPlaceResource;
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
     * Store a newly created resource in storage.
     */
    public function store(StoreInterestsPlaceRequest $request)
    {
        //
        try {
            $newInterestsPlace = InterestsPlace::create($request->validated());
            return response()->json(['interestsPlace' => new InterestsPlaceResource($newInterestsPlace)]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InterestsPlace $interestsPlace)
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
        try {
            $interestsPlace->delete();
            return response()->json(['message' => 'Interests place deleted successfully'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
