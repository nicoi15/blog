@extends('layouts.account')

@section('content')
    <h2>Change Password</h2>
    <!-- @if(session('errorMsg'))
    <div class="alert alert-icon alert-danger alert-dismissable fade in" role="alert">
        <button class="close" type="button" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
        <i class="mdi mdi-check-all"></i>
        <strong>{{ $error }}</strong>
    </div>
    @endif -->
    {!! Form::open(['action' => ['AccountsController@updatepass', Auth::user()->id], 'method' => 'POST']) !!}
        @csrf
        <div class="form-group">
            <label for="current-password">{{ __('Password') }}</label>
            <input id="current-password" type="password" class="form-control @error('current-password') is-invalid @enderror" name="current_password" required autocomplete="current-password" placeholder="Current Password">

            <!-- {{Form::label('oldpassword', 'Current Password')}}
            {{Form::password('oldpassword', ['class' => 'form-control', 'placeholder' => 'Current Password'])}} -->
            @error('current-password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm New Password">
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save', ['class' => 'btn btn-primary btn-sm mr-auto'])}}
    {!! Form::close() !!}
@endsection