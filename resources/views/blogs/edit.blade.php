@extends('layouts.account')

@section('content')
  <h2>Edit Blog</h2>
  {!! Form::open(['action' => ['PostsController@update', $post->post_id], 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/data']) !!}
  @csrf
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
      {{Form::label('body', 'Content')}}
      <input id="body" type="hidden" name="body" value="{{ $post->body }}"/>
    <trix-editor input="body"></trix-editor>
    </div>
    <div class="form-group">
      {{Form::label('tag', 'Tags')}}
      <select class="browser-default custom-select" id="tag" name="tag">
      @if (count($tags) > 0)
        @foreach ($tags as $tag)
            <option value="{{$tag->tag_id}}" 
            @if ($tag->tag_id == $post->tag_id)
              selected
            @endif
            >{{$tag->tag}}</option>
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
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Save', ['class' => 'btn btn-primary btn-sm mr-auto'])}}
  {!! Form::close() !!}
@endsection