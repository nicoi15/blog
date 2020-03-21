@extends('layouts.app')

@section('content')

    
<div class="row">
  <div class="col-md-8 mx-auto">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1>{{ $post->title }}</h1>
    <div class="card mb-4 wow fadeIn">
      @if($post->image != 'noimage')
        <img src="{{ asset($post->image) }}" class="card-img-top rounded-0" alt="Card image cap">
      @else
        <img src="{{ asset('images/no-image.jpg') }}" class="card-img-top rounded-0" alt="Card image cap">
      @endif
      
    </div>
    <div class="card mb-4 wow fadeIn">
      <div class="card-body">
        {{-- <p class="h3 my-4">{{ $post->title }} </p> --}}
        <p>{!! $post->body !!}</p>
      </div>
    </div>
    <div class="card mb-4 wow fadeIn">
      <div class="card-header font-weight-bold">
        <span>About author</span>
      </div>
      <div class="card-body">
        <div class="media d-block d-md-flex mt-3">
          <img class="d-flex mb-3 mx-auto z-depth-1"  
          @if ( $post->userGender() == 'Male')
          src="{{ asset('images/avatar-male.png') }}"
          @else
          src="{{ asset('images/avatar-female.jpg') }}"
          @endif
          alt="Card image cap" style="width;150px; height:150px; border-radius:50%;">
          <!-- <img class="d-flex mb-3 mx-auto z-depth-1" src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg"
            alt="Generic placeholder image" style="width: 100px;"> -->
          <div class="media-body text-center text-md-left ml-md-3 ml-0">
            <h5 class="mt-0 font-weight-bold">{{ $post->user() }}
            </h5>
            {{ $post->userAbout() }}
          </div>
        </div>

      </div>
    </div>
    <div class="card mb-4 wow fadeIn">
      <div class="card-header font-weight-bold">
        <span>Comments</span>
      </div>
      <div class="card-body">
        @if (count($comments) > 0)
          @foreach($comments as $comment)
            <strong>{{ $comment->name }}</strong>
            <p class="grey-text">{{$comment->created_at->format('m/d/Y h:i:s A')}}</p>
            <p>{{ $comment->comment }}</p>
            <hr />
          @endforeach
        @else
          No comments yet.
        @endif
        {{ $comments->links() }}
      </div>
    </div>





    <div class="card mb-3 wow fadeIn">
      <div class="card-header font-weight-bold">Leave a reply</div>
      <div class="card-body">
      {!! Form::open(['action' => ['CommentsController@comment', $post->post_id], 'method' => 'POST']) !!}
         @csrf  
        <div class="form-group">
            <label for="comment">Your comment</label>
            <!-- <textarea class="form-control" id="comment" rows="5" required></textarea> -->
            <textarea id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required></textarea>
            @error('comment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <label for="name">Your name</label>
          <!-- <input type="text" id="name" class="form-control" required> -->
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
          @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <br>
          <label for="email">Your e-mail</label>
          <!-- <input type="email" id="email" class="form-control" required> -->
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="text-center mt-4">
            {{Form::submit('Submit', ['class' => 'btn btn-primary btn-sm mr-auto'])}}
          </div>
        {{Form::hidden('_method', 'PUT')}}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div id="disqus_thread"></div>
  <script>

  /**
  *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
  *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
  
  var disqus_config = function () {
  this.page.url = url();  // Replace PAGE_URL with your page's canonical URL variable
  // this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
  };
  
  (function() { // DON'T EDIT BELOW THIS LINE
  var d = document, s = d.createElement('script');
  s.src = 'https://web2blog.disqus.com/embed.js';
  s.setAttribute('data-timestamp', +new Date());
  (d.head || d.body).appendChild(s);
  })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>

@endsection