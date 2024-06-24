<?php

namespace App\Http\Controllers;

use App\Filters\VisitFilter;
use App\Http\Resources\VisitResource;
use App\Models\Visit;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Http\Resources\VisitCollection;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new VisitFilter();

        $eloquentQuery = $filter->transform($request);

        $query = Visit::query();

        foreach ($eloquentQuery as $condition) {
            $query->where(...$condition);
        }

        $filteredResults = $query->orderByDesc('created_at')->get();

        return response()->json([
            'visits' => new VisitCollection($filteredResults)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitRequest $request)
    {
        //
        try {
            //
            $newVisit = Visit::create([
                'user_id' => $request->input('user_id'),
                'interests_place_id' => $request->input('interests_place_id')
            ]);

            return response()->json([
                'visit' => new VisitResource($newVisit)
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitRequest $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        //
    }
}
