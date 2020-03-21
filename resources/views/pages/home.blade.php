@extends('layouts.app')

@section('content')
<br />

<div class="container">
  <h3>Select Category/Tags</h3>
  {!! Form::open(['action' => 'PostsController@category', 'method' => 'POST']) !!}
  <div class="">
    <select class="mdb-select md-form" multiple id="tag" name="tag[]">
      <option value="" disabled selected>Filter Tags</option>
      @if (count($tags) > 0)
        @foreach ($tags as $tag)
          <option value="{{$tag->tag_id}}"
          @foreach($selectedTags as $selectedTag)
            @if ($selectedTag == $tag->tag_id)
              selected
            @endif
          @endforeach
          >{{$tag->tag}}</option>
        @endforeach
      @else
        
      @endif
    </select>
    {{Form::submit('Submit', ['class' => 'btn btn-primary btn-sm btn-block'])}}
  </div>
  {!! Form::close() !!}
  <br />
  <div class="row row-cols-1 row-cols-md-3">
    @if(count($posts) > 0)
      @foreach ($posts as $post)
      <div class="col mb-3">
        <!-- Card -->
        <div class="card promoting-card">
          <!-- Card content -->
          <div class="card-body d-flex flex-row">
            <div>
              <!-- Title -->
              <h4 class="card-title font-weight-bold mb-2">{{ $post->title }}</h4>
              <p class="card-text"><i class="far fa-user pr-2"></i>Posted by: <b>{{ $post->user() }}</b></p>
              <p class="card-text"><i class="far fa-clock pr-2"></i>Posted on: <b>{{ $post->created_at->format('m/d/Y h:i:s A') }}</b></p>
            </div>
          </div>
          <!-- Card image -->
          <div class="view overlay">
            @if($post->image == 'noimage')
            <img class="card-img-top rounded-0" src="{{ asset('images/no-image.jpg') }}" alt="Card image cap">
            @else
            <img class="card-img-top rounded-0" src="{{ asset($post->image)}}" alt="Card image cap">
            @endif
            
            <a href="/posts/{{$post->post_id}}">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!-- Card content -->
          <div class="card-body">
            <div class="collapse-content">
              <!-- Text -->
              <p class="card-text collapse" id="collapseContent">{{ strip_tags($post->body) }}</p>
              <!-- Button -->
              <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" href="/posts/{{$post->post_id}}"></a>
            </div>
          </div>
        </div>
        <!-- Card -->
      </div>
      @endforeach
    @else
      <p>No posts found</p>
    @endif
      
  </div>
  {{ $posts->links() }}
</div>
@endsection