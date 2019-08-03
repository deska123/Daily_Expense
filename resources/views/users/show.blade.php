@extends('../template')

@section('content')
  <br><br><br>
  <div id="userDetail">
    <h2>Detail of User</h2>
    @if (!empty($users))
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <td>{{ $users->id }}</td>
        </tr>
        <tr>
          <th>Name</th>
          <td>{{ $users->name }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ $users->email }}</td>
        </tr>
        <tr>
          <th>Email Verification DateTime</th>
          <td>{{ $users->email_verified_at }}</td>
        </tr>
        <tr>
          <th>Level</th>
          <td>{{ $users->level }}</td>
        </tr>
      </table>
      <br><br><br>
      <table class="table table-dark">
        <tr>
          <th>Created At</th>
          <td>{{ $users->created_at }}</td>
        </tr>
        <tr>
          <th>Updated At</th>
          <td>{{ $users->updated_at }}</td>
        </tr>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif
    <a href="{{ url('users') }}" class="btn btn-danger btn-md">Back to Users List</a>
  </div>
@endsection
