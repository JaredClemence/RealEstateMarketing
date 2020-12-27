@php
$property = $webinar->property
@endphp
<li class="list-group-item">
    <form action="{{route('webinar.delete',compact('webinar','property'))}}" method='POST'>
        
        @csrf
        @method('DELETE')
        @php
        $routeUrl = route('public.webinar.show',compact('webinar','property'));
        @endphp
        Public Url: <a href="{{$routeUrl}}" target="_blank">{{$routeUrl}}</a>  
        <br/>Embeds: <span class='d-inline'>{{$webinar->link}}</span>
        <br/>Day: <span class='d-inline'>{{$webinar->day_of_week}} {{$webinar->time->format('H:i')}}</span> <button type='submit' class='btn btn-link'>Delete</button>
    </form>
</li>
