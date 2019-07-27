@extends('../template')

@section('content')
  <br><br><br>
  <div id="vehicleTypeDetail">
    <h2>Detail of Vehicle Type</h2>
    @if (!empty($vehicle_type))
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <td>{{ $vehicle_type->id }}</td>
        </tr>
        <tr>
          <th>Type</th>
          <td>{{ $vehicle_type->type }}</td>
        </tr>
      </table>
      <br><br><br>
      <table class="table table-dark">
        <tr>
          <th>Created At</th>
          <td>{{ $vehicle_type->created_at }}</td>
        </tr>
        <tr>
          <th>Created By</th>
          <td>{{ $vehicle_type->created_by }}</td>
        </tr>
        <tr>
          <th>Updated At</th>
          <td>{{ $vehicle_type->updated_at }}</td>
        </tr>
        <tr>
          <th>Updated By</th>
          <td>{{ $vehicle_type->updated_by }}</td>
        </tr>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif
    <a href="{{ url('vehicle_type') }}" class="btn btn-danger btn-md">Back to Vehicle Type List</a>
  </div>
@endsection
