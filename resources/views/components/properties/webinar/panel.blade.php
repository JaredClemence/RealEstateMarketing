<h2>Webinars</h2>
<div class="list-group">
    @foreach($property->webinars as $webinar)
    <x-properties.webinar.list-item :webinar="$webinar"></x-properties.webinar.list-item>
    @endforeach
    <li class='list-group-item'>
        <form action='{{route('webinar.store',compact('property'))}}' method='POST'>
            @csrf
            @method('POST')
            <x-form-text-input type='text' name='link'>YouTube Link</x-form-text-input>
            <x-form-text-input type='text' name='day_of_week'>Day of Week</x-form-text-input>
            <x-form-text-input type='text' name='time'>Time</x-form-text-input>
            <button type='submit' class='btn btn-primary'>Create New Webinar</button>
        </form>
    </li>
</div>
