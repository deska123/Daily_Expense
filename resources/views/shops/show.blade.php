@extends('../template')

@section('content')
  <br><br><br>
  <div id="shopsDetail">
    <h2>Detail of Shop</h2>
    @if (!empty($shop))
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <td>{{ $shop->id }}</td>
        </tr>
        <tr>
          <th>Name</th>
          <td>{{ $shop->name }}</td>
        </tr>
      </table>
      <br><br><br>
      <table class="table table-dark">
        <tr>
          <th>Created At</th>
          <td>{{ $shop->created_at }}</td>
        </tr>
        <tr>
          <th>Created By</th>
          <td>{{ $shop->created_by }}</td>
        </tr>
        <tr>
          <th>Updated At</th>
          <td>{{ $shop->updated_at }}</td>
        </tr>
        <tr>
          <th>Updated By</th>
          <td>{{ $shop->updated_by }}</td>
        </tr>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif
    <a id="backToShopsListButton" href="{{ url('shops') }}" class="btn btn-danger btn-md">Back to Shops List</a>
  </div>
@endsection
