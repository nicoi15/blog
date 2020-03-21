@if(count($errors) > 0)
  @foreach ($errors->all() as $error)
      <div class="alert alert-icon alert-danger" role="alert">
        <button class="close" type="button" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
        <i class="mdi mdi-check-all"></i>
        <strong></strong>
        {{ $error }}
      </div>
  @endforeach
@endif

@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif