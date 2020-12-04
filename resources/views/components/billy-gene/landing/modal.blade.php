<div class="modal" tabindex="-1" id='{{$id}}'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{$prompt}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method='POST' action='{{route('leads.store', compact('property'))}}' enctype="multipart/form-data">
              @csrf
              @method('POST')
              <x-form-text-input name='name' type='text'>Name</x-form-text-input>
              <x-form-text-input name='email' type='email'>Email</x-form-text-input>
              <x-form-text-input name='phone' type='phone'>Phone</x-form-text-input>
              <button type='submit' class='btn btn-primary btn-block'>{{$buttonText}}</button>
          </form>
      </div>
    </div>
  </div>
</div>

