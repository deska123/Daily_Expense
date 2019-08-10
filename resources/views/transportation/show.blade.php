@extends('../template')

@section('content')
  <br><br><br>
  <div id="transportationDetail">
    <h2>Detail of Transportation</h2>
    @if (!empty($transportation))
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <td>{{ $transportation->id }}</td>
        </tr>
        <tr>
          <th>Vehicle Type</th>
          <td>{{ $transportation->vehicleType->type }}</td>
        </tr>
        <tr>
          <th>Origin</th>
          <td>{{ $transportation->origin }}</td>
        </tr>
        <tr>
          <th>Destination</th>
          <td>{{ $transportation->destination }}</td>
        </tr>
        <tr>
          <th>Code</th>
          <td>{{ $transportation->code }}</td>
        </tr>
        <tr>
          <th>Fleet</th>
          <td>{{ $transportation->fleet }}</td>
        </tr>
        <tr>
          <th>Remark</th>
          <td>{{ $transportation->remark }}</td>
        </tr>
      </table>
      <br><br><br>
      <table class="table table-dark">
        <tr>
          <th>Created At</th>
          <td>{{ $transportation->created_at }}</td>
        </tr>
        <tr>
          <th>Created By</th>
          <td>{{ $transportation->created_by }}</td>
        </tr>
        <tr>
          <th>Updated At</th>
          <td>{{ $transportation->updated_at }}</td>
        </tr>
        <tr>
          <th>Updated By</th>
          <td>{{ $transportation->updated_by }}</td>
        </tr>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif
    <a id="backToTransportationListButton" href="{{ url('transportation') }}" class="btn btn-danger btn-md">Back to Transportation List</a>
  </div>
@endsection
