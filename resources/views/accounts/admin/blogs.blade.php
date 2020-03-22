@extends('layouts.admin')

@section('content')
<h3>Users' Posts</h3>
  @if(count($posts) > 0)
    @foreach ($posts as $post)
      <div class="card">
        <div class="card-header">
          Posted on: <b>{{$post->created_at->format('m/d/Y h:i:s A')}}</b> Posted by: <b>{{ $post->user() }}</b>
          @if($post->status == '1')
            <span class="badge badge-success float-right">Active</span>
          @elseif($post->status == '2')
            <span class="badge badge-danger float-right">Removed by Admin</span>
          @else
            <span class="badge badge-danger float-right">Disabled</span>
          @endif
        </div>
        <div class="card-body">
            <div class="media d-block d-md-flex mt-3 collapse-content">
                @if($post->image == 'noimage')
                  <img class="card-img-top rounded-0" src="{{ asset('images/no-image.jpg') }}" alt="Card image cap" style="width: 100px;">
                @else
                  <img src="{{ asset($post->image) }}" class="card-img-top rounded-0" alt="Card image cap" style="width: 100px;">
                @endif
                
              <div class="media-body text-center text-md-left ml-md-3 ml-0">
                <h5 class="mt-0 font-weight-bold">{{ $post->title }}</h5>
                <p class="card-text collapse" id="collapseContent">{{ strip_tags($post->body) }}</p>
              </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="adminBlogDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content">
                  <!--Header-->
                  <div class="modal-header">
                    <p class="heading lead">Remove Post</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                  </div>

                  <!--Body-->
                  <div class="modal-body">
                    <div class="text-center">
                      <p>Are you sure you want to delete this post?</p>
                      
                    </div>
                  </div>

                  <!--Footer-->
                  <div class="modal-footer justify-content-center">
                    {!! Form::open(['action' => ['PostsController@destroy', $post->post_id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                      <input type="hidden" class="form-control" name="postid" id="postid">
                      {{Form::hidden('_method', 'DELETE')}}
                      {{-- <a type="button" class="btn btn-success btn-sm" href="/admin/blogs/{{$post->post_id}}">Yes</a> --}}
                      {{Form::submit('Yes', ['class' => 'btn btn-danger btn-sm'])}}
                    {!!Form::close()!!}
                    <a type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</a>
                  </div>
                </div>
                <!--/.Content-->
              </div>
            </div>
            <!-- Central Modal Medium Success-->
            <!-- Modal End -->

            <div class="container-fluid">
              @if($post->status == '1')
                <div class="row">
                  <a href="/posts/{{$post->post_id}}" class="btn btn-primary btn-sm"> 
                  <i class="far fa-eye mdb-gallery-view-icon mr-3"></i>View</a>
                  <a href="/posts/{{$post->post_id}}/edit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#adminBlogDelete" data-postid="{{ $post->post_id }}">
                  <i class="fas fa-trash mdb-gallery-view-icon mr-3"></i>Remove</a>
                </div>
              @endif
            </div>
        </div>
        <span class="badge badge-primary float-right">Tag: <b>{{ $post->tag() }} {{ $post->post_id }}</b></span>
      </div>
      <br />
    @endforeach
  @else
    <p>No posts found</p>
  @endif
@endsection