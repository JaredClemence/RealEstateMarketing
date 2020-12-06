<x-bootstrap-page pageTitle="Spinner Test">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <form method="POST">
                    @csrf
                    <h2>Spin Text</h2>
                    <textarea name='spintext' class='form-control'>{{$spintext}}</textarea><br/>
                    <button type='submit' class='btn btn-primary'>Test</button>
                </form>
            </div>
            <div class='col-12 col-md-6'>
                <h2>Output</h2>
                {{$spuntext}}
            </div>
        </div>
    </div>
</x-bootstrap-page>
