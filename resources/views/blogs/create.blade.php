@extends('layouts.account')

@section('content')
  <h2>Create a new Blog</h2>
  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
  @csrf
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'type' => 'text', 'name' => 'title'])}}
    </div>
    <div class="form-group">
      {{Form::label('body', 'Content')}}
      {{-- {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control'])}} --}}
      <input id="body" type="hidden" name="body"/>
      <trix-editor input="body" id="trix-editor"></trix-editor>
    </div>
    <div class="form-group">
      {{Form::label('tag', 'Tags')}}
      <select class="browser-default custom-select" id="tag" name="tag">
      <option value="" disabled selected>Select a Tag</option>
      @if (count($tags) > 0)
        @foreach ($tags as $tag)
          <option value="{{$tag->tag_id}}">{{$tag->tag}}</option>
        @endforeach
      @else
        
      @endif
      </select>
    </div>

    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
      </div>
      <div class="custom-file">
        {{Form::file('image', ['id' => 'inputGroupFile01', 'class' => 'form-control', 'aria-describedby' => 'inputGroupFileAddon01'])}}
        {{Form::label('inputGroupFile01', 'Choose File', ['class' => 'custom-file-label'])}}
      </div>
    </div>
    
    {{Form::submit('Submit', ['class' => 'btn btn-primary btn-sm mr-auto'])}}
    

  {!! Form::close() !!}
@endsection