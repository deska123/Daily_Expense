@extends('../template')

@section('content')
  <br><br><br>
  <div id="goodsDetail">
    <h2>Detail of Good</h2>
    @if (!empty($good))
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <td>{{ $good->id }}</td>
        </tr>
        <tr>
          <th>Name</th>
          <td>{{ $good->name }}</td>
        </tr>
        <tr>
          <th>Price</th>
          <td>{{ $good->price }}</td>
        </tr>
        <tr>
          <th>Remark</th>
          <td>{{ $good->remark }}</td>
        </tr>
      </table>
      <br><br><br>
      <table class="table table-dark">
        <tr>
          <th>Created At</th>
          <td>{{ $good->created_at }}</td>
        </tr>
        <tr>
          <th>Created By</th>
          <td>{{ $good->created_by }}</td>
        </tr>
        <tr>
          <th>Updated At</th>
          <td>{{ $good->updated_at }}</td>
        </tr>
        <tr>
          <th>Updated By</th>
          <td>{{ $good->updated_by }}</td>
        </tr>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif
    <a id="backToGoodsListButton" href="{{ url('goods') }}" class="btn btn-danger btn-md">Back to Goods List</a>
  </div>
@endsection
