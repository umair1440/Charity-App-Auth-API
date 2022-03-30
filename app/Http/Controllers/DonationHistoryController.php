<?php

namespace App\Http\Controllers;

use App\Models\donation_history;
use App\Http\Requests\Storedonation_historyRequest;
use App\Http\Requests\Updatedonation_historyRequest;

class DonationHistoryController extends Controller
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
     * @param  \App\Http\Requests\Storedonation_historyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedonation_historyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donation_history  $donation_history
     * @return \Illuminate\Http\Response
     */
    public function show(donation_history $donation_history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donation_history  $donation_history
     * @return \Illuminate\Http\Response
     */
    public function edit(donation_history $donation_history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedonation_historyRequest  $request
     * @param  \App\Models\donation_history  $donation_history
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedonation_historyRequest $request, donation_history $donation_history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donation_history  $donation_history
     * @return \Illuminate\Http\Response
     */
    public function destroy(donation_history $donation_history)
    {
        //
    }
}
