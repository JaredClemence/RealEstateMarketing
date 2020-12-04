<x-bootstrap-page pageTitle="Edit Lead">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <h1>Edit Lead</h1>
                <form action="{{route('leads.update', compact('property','lead'))}}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-form-text-input value='{{$lead->name}}' name='name' type='text'>Name</x-form-text-input>
                    <x-form-text-input value='{{$lead->email}}' name='email' type='text'>Email</x-form-text-input>
                    <x-form-text-input value='{{$lead->phone}}' name='phone' type='text'>Phone</x-form-text-input>
                    <button type='submit' class='btn btn-primary'>Save</button>
                </form>
            </div>
        </div>
    </div>
</x-bootstrap-page>

