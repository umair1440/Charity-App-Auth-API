<?php

namespace App\Http\Controllers;

use App\Models\needy_guy;
use App\Http\Requests\Storeneedy_guyRequest;
use App\Http\Requests\Updateneedy_guyRequest;

class NeedyGuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeneedy_guyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeneedy_guyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\needy_guy  $needy_guy
     * @return \Illuminate\Http\Response
     */
    public function show(needy_guy $needy_guy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\needy_guy  $needy_guy
     * @return \Illuminate\Http\Response
     */
    public function edit(needy_guy $needy_guy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateneedy_guyRequest  $request
     * @param  \App\Models\needy_guy  $needy_guy
     * @return \Illuminate\Http\Response
     */
    public function update(Updateneedy_guyRequest $request, needy_guy $needy_guy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\needy_guy  $needy_guy
     * @return \Illuminate\Http\Response
     */
    public function destroy(needy_guy $needy_guy)
    {
        //
    }
}
