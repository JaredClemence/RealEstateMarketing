<x-bootstrap-page pageTitle="Properties Creater">
    <style>
        .property-show .teaser {
            border-color:black;
            padding: 1rem;
            border-radius: 20px;
            box-sizing: content-box;
            border-width: 3px;
        }
        .property-show span {
            display: block;
        }
    </style>
    <div class="container property-show">
        <div class="row">
            <div class="col-12"><h1>Property Display</h1>

            </div>
            <div class="col-12 col-md-6">
                <h2>Address</h2>
                <span>Street: {{$property->address}}</span>
                <span>City: {{$property->city}}</span>
                <span>State: {{$property->state}}</span>
                <span>Zip: {{$property->zip}}</span>
                <hr class="d-xs-block d-md-none"/>
            </div>
            <div class='col-12 col-md-6'>
                <h2>House Stats</h2>
                <span>Bedrooms: {{$property->beds}}</span>
                <span>Bathrooms: {{$property->baths}}</span>
                <span>Square Footage: {{$property->sqft}}</span>
                <hr class="d-xs-block d-md-none"/>
            </div>
            <div class='col-12'>
                <h2>Site Data</h2>
                <h5>Teaser:</h5>
                <p>{{$property->teaser_prompt}}</p>
                <h5>Image Page 1:</h5>
                <img src='{{asset($property->image1)}}' class="img img-fluid" />

                <div class='form-group'>
                    <br/><br/>
                    <h5>Thank you message text:</h5>
                    <div class='teaser'>{!!$property->teaser_text!!}</div>
                </div>
                <h5>Image Page 2</h5>
                <img src='{{asset($property->image2)}}' class="img img-fluid" /></span>
                <h5>eBrochure</h5>
                @if( $property->brochure )
                <embed src="{{asset($property->brochure)}}" width="100%" height="500" />
                @else
                <p>None</p>
                @endif
                <hr class="d-xs-block d-md-none"/>
            </div>
            <div class='col-12 col-md-6'>
                <h2>Virtual Tour</h2>
                <span>Url: {{$property->virtual_tour}}</span><br/>
                <hr class="d-xs-block d-md-none"/>
            </div>
            <div class="col-12 col-md-6">
                <x-properties.webinar.panel :property="$property"></x-properties.webinar.panel>
            </div>
            <div class='col-12 col-md-6'>
                <h2>Referral Agent</h2>
                <span>Name: {{$property->referral_agent_name}}</span><br/>
                <span>Email: {{$property->referral_agent_email}}</span>
                <hr class="d-xs-block d-md-none"/>
            </div>
            <div class='col-12 col-md-6 offset-md-3'>
                <br/><br/>
                <a href='{{route('property.edit',compact('property'))}}' class='btn btn-primary btn-block'>Edit Property</a>
                <br/><br/>
            </div>
        </div>
    </div>
</x-bootstrap-page>

