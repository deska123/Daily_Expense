@extends('../template')

@section('content')
  <br><br><br>
  <div id="othersDetail">
    <h2>Detail of Others</h2>
    @if (!empty($other))
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <td>{{ $other->id }}</td>
        </tr>
        <tr>
          <th>Remark</th>
          <td>{{ $other->remark }}</td>
        </tr>
      </table>
      <br><br><br>
      <table class="table table-dark">
        <tr>
          <th>Created At</th>
          <td>{{ $other->created_at }}</td>
        </tr>
        <tr>
          <th>Created By</th>
          <td>{{ $other->created_by }}</td>
        </tr>
        <tr>
          <th>Updated At</th>
          <td>{{ $other->updated_at }}</td>
        </tr>
        <tr>
          <th>Updated By</th>
          <td>{{ $other->updated_by }}</td>
        </tr>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif
    <a id="backToOthersListButton" href="{{ url('others') }}" class="btn btn-danger btn-md">Back to Others List</a>
  </div>
@endsection
