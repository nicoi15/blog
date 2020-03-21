@extends('layouts.account')

@section('content')
  <h2>{{ Auth::user()->name }}'s Profile</h2>
  <img class="mx-auto d-block"  
  @if ( Auth::user()->gender == 'Male')
    src="{{ asset('images/avatar-male.png') }}"
  @else
  src="{{ asset('images/avatar-female.jpg') }}"
  @endif
  alt="Card image cap" style="width;150px; height:150px; border-radius:50%;">
  
  {!! Form::open(['action' => ['AccountsController@update', Auth::user()->id], 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/data']) !!}
  @csrf
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('gender', 'Gender')}}
        <select class="browser-default custom-select" id="gender" name="gender">
        @if ( Auth::user()->gender == 'Male')
            <option value="Male" selected>Male</option>
            <option value="Female">Female</option>
        @else
            <option value="Male">Male</option>
            <option value="Female" selected>Female</option>
        @endif
        </select>
    </div>
    <div class="form-group">
      {{Form::label('about', 'About')}}
      {{Form::textarea('about', Auth::user()->about, ['class' => 'form-control', 'placeholder' => 'About'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Save', ['class' => 'btn btn-primary btn-sm mr-auto'])}}
  {!! Form::close() !!}
@endsection