<?php

namespace App\Http\Controllers;

use App\Models\Checkpoint;
use App\Http\Requests\StoreCheckpointRequest;
use App\Http\Requests\UpdateCheckpointRequest;

class CheckpointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCheckpointRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkpoint $checkpoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkpoint $checkpoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCheckpointRequest $request, Checkpoint $checkpoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkpoint $checkpoint)
    {
        //
    }
}
