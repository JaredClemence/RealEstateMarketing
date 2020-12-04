<li class="list-group-item">
    <div class="row">
        <div class="col-12 col-md-4">
            {{$property->address}}<br/>
            {{$property->city}}, {{$property->state}} {{$property->zip}}
        </div>
        <div class="col-6 col-md-4">
            Beds: {{$property->beds}}<br/>
            Baths: {{$property->baths}}<br/>
            Sqft: {{$property->sqft}}<br/>
        </div>
        <div class="col-6 col-md-4">
            <a href="{{route('property.edit', compact('property'))}}" class="btn btn-link">Edit</a>
            <form action='{{route('property.delete', compact('property'))}}' method='POST'>
                @csrf
                @method('DELETE')
                <button type='submit' class="btn btn-link">Delete</button>
            </form>
        </div>
    </div>
</li>
