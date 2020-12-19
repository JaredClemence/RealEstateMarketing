@php
$data = [
'address',
'city',
'state',
'zip',
'beds',
'baths',
'sqft',
'teaser_text',
'teaser_prompt',
'virtual_tour',
'virtual_embed',
];
foreach($data as $value ){
    if( session($value) ){
        $data[$value] = session($value);
    }else{
        $data[$value] = $property->{$value};
    }
}
extract($data, \EXTR_OVERWRITE);
@endphp
<x-bootstrap-page pageTitle="Properties Creater">
    <form method="POST" action='{{route('property.update',compact('property'))}}' enctype="multipart/form-data">
            <div class="container">
        <div class="row">
                <div class="col-12"><h1>Edit Property (Admins Only)</h1>
                    @csrf
                    @method('PUT')
                </div>
            <div class="col-12 col-md-6">
                    <h2>Address</h2>
                    <x-form-text-input type="text" name="address" value='{{$address}}'>Street Address</x-form-text-input>
                    <x-form-text-input type="text" name="city" value='{{$city}}'>City</x-form-text-input>
                    <x-form-text-input type="text" name="state" value='{{$state}}'>State</x-form-text-input>
                    <x-form-text-input type="text" name="zip" value='{{$zip}}'>Zip</x-form-text-input>
                    <hr class="d-xs-block d-md-none"/>
                    
                    
            </div>
                <div class='col-12 col-md-6'>
                    <h2>House Stats</h2>
                    <x-form-text-input type="text" name="beds" value='{{$beds}}'>Bedrooms</x-form-text-input>
                    <x-form-text-input type="text" name="baths" value='{{$baths}}'>Bathrooms</x-form-text-inupt>
                    <x-form-text-input type="text" name="sqft" value='{{$sqft}}'>Square Footage</x-form-text-input>
                    <hr class="d-xs-block d-md-none"/>
                </div>
            <div class='col-12'>
                    <h2>Site Data</h2>
                    <x-form-text-input type="text" name="teaser_prompt" value='{{$teaser_prompt}}'>Teaser Prompt</x-form-text-input>
                    <x-form-text-input type="file" name="image1">Image Page 1</x-form-text-input>
                    <div class='form-group'>
                        <label for='teaser_text'>
                            Thank you message text:
                        </label>
                        <textarea class='form-control' name='teaser_text'>{{$teaser_text}}</textarea>
                    </div>
                    <x-form-text-input type="file" name="image2">Image Page 2</x-form-text-inupt>
                    <x-form-text-input type="file" name="brochure">eBrochure</x-form-text-input>
                    <x-form-text-input type="text" name="virtual_tour" value='{{$virtual_tour}}'>Virtual Tour URI</x-form-text-input>
                    <div class='form-group'>
                        <label for='virtual_embed'>
                            Virtual Embed Code:
                        </label>
                        <textarea class='form-control' name='virtual_embed'>{{$virtual_embed}}</textarea>
                    </div>
                    <hr class="d-xs-block d-md-none"/>
                </div>
            <div class='col-12 col-md-6 offset-md-3'>
                <br/><br/>
                <button type='submit' class='btn btn-primary btn-block'>Save Property Changes</button>
                <br/><br/>
            </div>
        </div>
    </div>
                </form>
</x-bootstrap-page>
