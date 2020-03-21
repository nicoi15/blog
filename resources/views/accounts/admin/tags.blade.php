@extends('layouts.admin')

@section('content')
<h3>Tags</h3>
<div class="row mx-auto">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        {{-- <form method="POST" role="form" action="TagsController@store"> --}}
          {!! Form::open(['action' => 'TagsController@store', 'method' => 'POST']) !!}
          <div class="form-group">
            {{Form::label('tagName', 'Add new Tag')}}
            {{Form::text('tagName', '', ['class' => 'form-control', 'placeholder' => 'Tag Name', 'type' => 'text', 'name' => 'tagName'])}}
            {{-- <label for="tagName">Add new Tag</label>
            <input type="text" class="form-control" id="tagName" placeholder="Tag Name"> --}}
          </div>
          {{-- <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button> --}}
          {{Form::submit('Submit', ['class' => 'btn btn-primary btn-sm btn-block'])}}
        {!! Form::close() !!}
        {{-- </form> --}}
      </div>
    </div>
    
  </div>
  <div class="col mx-auto">
    
    {{-- <div class="row mx-auto p-3">
      <form action="" class="d-flex justify-content-center">
        <div class="col-md-9">
          <input type="text" class="form-control" id="firstName" placeholder="Add New Tag">
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
      </form>
    </div> --}}
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Tag Name</th>
          <th>Date Added</th>
        </tr>
      </thead>
      <tbody>
        @if (count($tags) > 0)
          @foreach ($tags as $tag)
        <tr>
          <td>{{ $tag->tag }}</td>
          <td>{{ $tag->created_at }}</td>
          <td class="project-actions text-right">
            <a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt mdb-gallery-view-icon mr-3"></i>Edit</a>
            <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash mdb-gallery-view-icon mr-3"></i>Delete</a>
          </td>
        </tr>
        @endforeach
          @else
            No tags found
          @endif
      </tbody>
    </table>
  </div>
</div>
@endsection
