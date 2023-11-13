<?php

namespace App\Http\Controllers;

use App\Models\StudiKasus;
use App\Http\Requests\StoreStudiKasusRequest;
use App\Http\Requests\UpdateStudiKasusRequest;

class StudiKasusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.studi_kasus');
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
    public function store(StoreStudiKasusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudiKasus $studiKasus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudiKasus $studiKasus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudiKasusRequest $request, StudiKasus $studiKasus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudiKasus $studiKasus)
    {
        //
    }
}
