<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\NewLeadRequest;
use App\Events\NewRegistration;
use App\Events\BrochureRequest;

class LeadController extends Controller
{
    public function makeLead( Property $property, $name, $email, $phone ){
        $key=[
            'property_id'=>$property->id,
            'email'=>$email
        ];
        $lead = Lead::where($key)->first();
        if( $lead == null ){
            $lead = Lead::firstOrCreate($key);
            NewRegistration::dispatch($lead);
        }
        $add = compact('name','phone');
        /* @var $lead Lead */
        $lead->fill( $add );
        $lead->save();
        return $lead;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        $leads = $property->leads;
        return view('leads.index', compact('leads','property'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewLeadRequest $request, Property $property)
    {
        $all = $request->all(['name','email','phone']);
        \extract( $all );
        $lead = $this->makeLead($property, $name, $email, $phone);
        BrochureRequest::dispatch($lead);
        return redirect()->route('offer.thanks',compact('property'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property, Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property, Lead $lead)
    {
        return view('leads.edit', compact('lead','property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property, Lead $lead)
    {
        $lead->fill( $request->all(['name','email','phone']));
        $lead->save();
        return redirect()->route('leads.index',compact('property','lead'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property, Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index',compact('property','lead'));
    }
}
