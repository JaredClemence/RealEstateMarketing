<x-bootstrap-page pageTitle="Properties Creater">
    <form method="POST">
            <div class="container">
        <div class="row">
                <div class="col-12"><h1>New Property (Admins Only)</h1>
                    @csrf
                </div>
            <div class="col-12 col-md-6">
                    <h2>Address</h2>
                    <x-form-text-input type="text" name="address">Street Address</x-form-text-input>
                    <x-form-text-input type="text" name="city">City</x-form-text-input>
                    <x-form-text-input type="text" name="state">State</x-form-text-input>
                    <x-form-text-input type="text" name="zip">Zip</x-form-text-input>
                    <hr class="d-xs-block d-md-none"/>
                    
                    
            </div>
                <div class='col-12 col-md-6'>
                    <h2>House Stats</h2>
                    <x-form-text-input type="text" name="beds">Bedrooms</x-form-text-input>
                    <x-form-text-input type="text" name="baths">Bathrooms</x-form-text-inupt>
                    <x-form-text-input type="text" name="sqft">Square Footage</x-form-text-input>
                    <hr class="d-xs-block d-md-none"/>
                </div>
            <div class='col-12'>
                    <h2>Site Data</h2>
                    <x-form-text-input type="text" name="teaser_prompt">Teaser Prompt</x-form-text-input>
                    <x-form-text-input type="file" name="image1">Image Page 1</x-form-text-input>
                    <div class='form-group'>
                        <label for='teaser_text'>
                            Thank you message text:
                        </label>
                        <textarea class='form-control'></textarea>
                    </div>
                    <x-form-text-input type="file" name="image2">Image Page 2</x-form-text-inupt>
                    <hr class="d-xs-block d-md-none"/>
                </div>
            <div class='col-12 col-md-6 offset-md-3'>
                <br/><br/>
                <button type='submit' class='btn btn-primary btn-block'>Create Property</button>
                <br/><br/>
            </div>
        </div>
    </div>
                </form>
</x-bootstrap-page>
