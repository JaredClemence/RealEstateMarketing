<x-bootstrap-page pageTitle="Property Index">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Property List (Admin Only)</h1>
                @if( count( $properties ) == 0 )
                <x-alert type='danger'>No properties have been set up.</x-alert>
                @endif
                @foreach($properties as $property)
                <ul class="list-group">
                    <x-properties.index-item :property="$property"></x-properties.index-item>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</x-bootstrap-page>

