<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\People;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StorePeopleRequest;
use App\Http\Requests\V1\UpdatePeopleRequest;
use App\Http\Resources\V1\PeopleResource;
use App\Http\Resources\V1\PeopleCollection;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return new PeopleCollection(People::all());
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
    public function store(StorePeopleRequest $request)
    {
        return new PeopleResource(People::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(People $person)
    {
        return new PeopleResource($person);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(People $people)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeopleRequest $request, People $person)
    {
        return response($person->update($request->all()), 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $person)
    {
        $person->delete();

        return response(null, 204);
    }
}
