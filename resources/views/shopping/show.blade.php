@extends('../template')

@section('content')
  <br><br><br>
  <div id="shoppingDetail">
    <h2>Detail of Shopping</h2>
    @if (!empty($shopping))
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <td>{{ $shopping->id }}</td>
        </tr>
        <tr>
          <th>Shops and Goods List</th>
          <td>
            <table class="table table-bordered">
              <thead>
                <th>Shop</th>
                <th>Good</th>
                <th>Remark</th>
                <th>Price per Good</th>
                <th>Qty</th>
                <th>Total</th>
              </thead>
              <tbody>
                @if (!empty($shopping->shoppingdetails))
                  @foreach ($shopping->shoppingdetails as $shoppingdetail)
                    <tr>
                      <td>{{ $shoppingdetail->shop->name }}</td>
                      <td>{{ $shoppingdetail->good->name }}</td>
                      <td>{{ $shoppingdetail->remark }}</td>
                      <td>{{ $shoppingdetail->good->price }}</td>
                      <td>{{ $shoppingdetail->qty }}</td>
                      <td>{{ $shoppingdetail->good->price * $shoppingdetail->qty }}</td>
                    </tr>
                  @endforeach
                  <tr>
                    <td class="text-center" colspan="5">Price Total of This Shopping</td>
                    <td>{{ $expenseTotal }}</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </td>
        </tr>
      </table>
      <br><br><br>
      <table class="table table-dark">
        <tr>
          <th>Created At</th>
          <td>{{ $shopping->created_at }}</td>
        </tr>
        <tr>
          <th>Created By</th>
          <td>{{ $shopping->created_by }}</td>
        </tr>
        <tr>
          <th>Updated At</th>
          <td>{{ $shopping->updated_at }}</td>
        </tr>
        <tr>
          <th>Updated By</th>
          <td>{{ $shopping->updated_by }}</td>
        </tr>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif
    <a id="backToShoppingListButton" href="{{ url('shopping') }}" class="btn btn-danger btn-md">Back to Shopping List</a>
  </div>
@endsection
