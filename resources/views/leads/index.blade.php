<x-bootstrap-page pageTitle="Property Leads Index">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Lead List: {{$property->address}}</h1>
                @if( count( $leads ) == 0 )
                <x-alert type='danger'>No leads for this property offer.</x-alert>
                @endif
                @foreach($leads as $lead)
                <ul class="list-group">
                    <x-leads.index-item :lead="$lead" :property="$property"></x-leads.index-item>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</x-bootstrap-page>
