@php
$property = $webinar->property
@endphp
<li class="list-group-item">
    <form action="{{route('webinar.delete',compact('webinar','property'))}}" method='POST'>
        
        @csrf
        @method('DELETE')
        Url: <span class='d-inline'>{{route('public.webinar.show',compact('webinar','property'))}}</span>  <button type='submit' class='btn btn-link'>Delete</button>
    </form>
</li>
