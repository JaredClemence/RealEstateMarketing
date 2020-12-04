<li class="list-group-item">
    <div class="row">
        <div class="col-12 col-md-4">
            {{$lead->name}}
        </div>
        <div class="col-6 col-md-4">
            {{$lead->email}}<br/>{{$lead->phone}}
        </div>
        <div class="col-6 col-md-4">
            <a href="{{route('leads.edit', compact('property','lead'))}}" class="btn btn-link">Edit</a>
            <form action='{{route('leads.delete', compact('property','lead'))}}' method='POST'>
                @csrf
                @method('DELETE')
                <button type='submit' class="btn btn-link">Delete</button>
            </form>
        </div>
    </div>
</li>
