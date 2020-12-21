<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;
use App\Models\Property;

class WebinarController extends Controller
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
    public function create(Property $property)
    {
        return view('webinar.create',compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Property $property)
    {
        $data = $request->all([
            'link',
            'time',
            'day_of_week'
        ]);
        $data['property_id']=$property->id;
        $webinar = new Webinar();
        $webinar->fill($data);
        $webinar->save();
        return redirect()->route('property.show', compact('property'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function show(Webinar $webinar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function edit(Webinar $webinar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webinar $webinar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webinar $webinar, Property $property)
    {
        $webinar->delete();
        return redirect()->route('property.show', compact('property'));
    }
}
