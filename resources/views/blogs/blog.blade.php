@extends('layouts.account')

@section('content')
<h2>Your Posted Blogs</h2>
  @if(count($posts) > 0)
    @foreach ($posts as $post)
      <div class="card">
        
        <div class="card-header">
          Posted on: <b>{{$post->created_at->format('m/d/Y h:i:s A')}}</b>
          @if($post->status == '1')
            <span class="badge badge-success float-right">Active</span>
          @elseif($post->status == '2')
            <span class="badge badge-danger float-right">Removed by Admin</span>
          @else
            <span class="badge badge-danger float-right">Removed</span>
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
            <div class="container-fluid">
              @if($post->status == '1')
                <div class="row">
                  <a href="/posts/{{$post->post_id}}" class="btn btn-primary btn-sm"> 
                  <i class="far fa-eye mdb-gallery-view-icon mr-3"></i>View</a>
                  <a href="/posts/{{$post->post_id}}/edit" class="btn btn-default btn-sm">
                  <i class="far fa-edit mdb-gallery-view-icon mr-3"></i>Edit</a>
                </div>
              @endif
              
            </div>
        </div>
        <span class="badge badge-primary"><b>{{ $post->tag() }}</b></span>
      </div>
      <br />
    @endforeach
  @else
    <p>No posts found</p>
  @endif

@endsection