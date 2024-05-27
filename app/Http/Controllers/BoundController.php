<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoundCollection;
use App\Models\Bound;
use App\Http\Requests\StoreBoundRequest;
use App\Http\Requests\UpdateBoundRequest;
use Illuminate\Http\Request;

class BoundController extends Controller
{
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoundRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bound $bound)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bound $bound)
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
}
