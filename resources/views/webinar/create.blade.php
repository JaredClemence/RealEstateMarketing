<x-bootstrap-page pageTitle="Webinar Creater">
    <form method="POST" action='{{route('webinar.store',compact('property'))}}'>
            <div class="container">
        <div class="row">
                <div class="col-12"><h1>New Webinar (Admins Only)</h1>
                    @csrf
                    @method('POST')
                </div>
            <div class="col-12">
                    <h2>Address: {{$property->street}}</h2>
                    
                    <x-form-text-input type="text" name="day_of_week" value='Saturday'>Day of the Week</x-form-text-input>
                    <x-form-text-input type="text" name="time" value='11:00'>Time of Day (24-hour clock)</x-form-text-input>
                    <x-form-text-input type="text" name="link">Link to Webinar</x-form-text-input>
                    <hr class="d-xs-block d-md-none"/>
                    
                    
            </div>
                
            <div class='col-12 col-md-6 offset-md-3'>
                <br/><br/>
                <button type='submit' class='btn btn-primary btn-block'>Create Webinar</button>
                <br/><br/>
            </div>
        </div>
    </div>
                </form>
</x-bootstrap-page>

