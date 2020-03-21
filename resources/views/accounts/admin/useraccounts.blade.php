@extends('layouts.admin')

@section('content')
<h3>Users</h3>
<div class="table-responsive text-nowrap">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @if (count($users) > 0)
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              @if ($user->status == '1')
              <td><span class="badge badge-success">Active</span></td>
              <td>
                <a href="#" class="btn btn-danger btn-sm" style="width: 120px;">
                <i class="fas fa-ban mdb-gallery-view-icon mr-3"></i>Disable</a>
              </td>
              @else
              <td><span class="badge badge-danger">Disabled</span></td>
              <td>
                <a href="#" class="btn btn-success btn-sm" style="width: 120px;">
                <i class="far fa-check-circle mdb-gallery-view-icon mr-3"></i>Enable</a>
              </td>
              @endif
              
            </tr>
          @endforeach
      @else
          No users found
      @endif
      
    </tbody>
  </table>
</div>
@endsection

