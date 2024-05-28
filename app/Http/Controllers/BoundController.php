<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoundCollection;
use App\Http\Resources\BoundResource;
use App\Models\Bound;
use App\Http\Requests\StoreBoundRequest;
use App\Http\Requests\UpdateBoundRequest;
use Illuminate\Http\Request;
use Throwable;

class BoundController extends Controller
{
    public $conflictingBounds;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        try {
            return response()->json([
                'bounds' => new BoundCollection(
                    Bound::where('interests_place_id', '=', $request->interestsPlaceId)->get()
                )
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
    public function store(StoreBoundRequest $request)
    {
        $this->conflictingBounds = false;

        //
        try {
            $newBoundLatitude = $request->input('latitude');
            $newBoundLongitude = $request->input('longitude');

            $existingBounds = Bound::where('interests_place_id', '=', $request->input('interests_place_id'))->get();

            // Check for conflicts with existing bounds
            if (count($existingBounds) > 0) {

                foreach ($existingBounds as $key => $existingBound) {

                    $distance = self::calculateDistanceBetween($newBoundLatitude, $newBoundLongitude, $existingBound->latitude, $existingBound->longitude);

                    if ($distance < 10) {
                        $this->conflictingBounds = true;
                        break; // Exit the loop once a conflict is found
                    }
                }
            }

            // Return error response if conflicting bounds exist
            if ($this->conflictingBounds) {
                // return response()->json(['message' => 'Conflicting bounds found.'], 400);
                abort(409, 'Conflicting bounds detected. Bounds must be at least 5 meters apart');
            }

            // Create a new bound if no conflicts exist
            $newBound = Bound::create([
                'latitude' => $newBoundLatitude,
                'longitude' => $newBoundLongitude,
                'interests_place_id' => $request->input('interests_place_id')
            ]);

            // Return success response with the newly created bound
            return response()->json(['bound' => new BoundResource($newBound)], 201);
        } catch (\Throwable $th) {
            // Handle exceptions and return error response
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bound $bound)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoundRequest $request, Bound $bound)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bound $bound)
    {
        //
    }

    public function calculateDistanceBetween($lat1, $lng1, $lat2, $lng2)
    {
        //
        return 6371 * 1000 * acos(
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lng2) - deg2rad($lng1)) +
                sin(deg2rad($lat1)) * sin(deg2rad($lat2))
        );
    }
}
