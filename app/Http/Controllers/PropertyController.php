<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = new Property();
        return view('properties.create', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = new Property();
        $this->update($request, $property);
        return redirect()->route('property.show',compact('property')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $keys = [
            'address',
            'city',
            'state',
            'zip',
            'beds',
            'baths',
            'zip',
            'teaser_text',
            'teaser_prompt',
            'virtual_tour',
            'virtual_embed',
        ];
        if( $request->hasFile('image1')){
            $image1 = $request->image1->store('images','public');
            $property->image1 = $image1;
        }
        if( $request->hasFile('image2')){
            $image2 = $request->image2->store('images','public');
            $property->image2 = $image2;
        }
        if( $request->hasFile('brochure') ){
            $brochure = $request->brochure->store('pdfs','public');
            $property->brochure = $brochure;
        }
        $data = $request->all($keys);
        $property->fill( $data );
        $property->save();
        return redirect()->route('property.show',compact('property'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property.index');
    }
}
