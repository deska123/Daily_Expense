@extends('../template')

@section('content')
  <br><br><br>
  <div id="expenseDetail">
    <h2>Detail of Expense</h2>
    @if (!empty($expense))
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <td>{{ $expense->id }}</td>
        </tr>
        <tr>
          <th>Category</th>
          @if ($expense->transportationFlag)
            <td>
              Transportation&nbsp;&nbsp;
              <button id="showDetailsInExpense" type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#detailModal">Show Transportation Details</button>
            </td>
          @elseif ($expense->shoppingFlag)
          <td>
            Shopping&nbsp;&nbsp;
            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#detailModal">Show Shopping Details</button>
          </td>
          @else
          <td>
            Others&nbsp;&nbsp;
            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#detailModal">Show Others Details</button>
          </td>
          @endif
        <tr>
          <th>Cost Total</th>
          <td>{{ $expense->costTotal }}</td>
        </tr>
        <tr>
          <th>Activity Date Time</th>
          <td>{{ $expense->activityDateTime }}</td>
        </tr>
        <tr>
          <th>Receipt</th>
            <td>
              @if (isset($expense->receipt))
                <a href="{{ asset($expense->receipt) }}" target="_blank" class="btn btn-warning btn-md">See Receipt File</a>
              @endif
            </td>
        </tr>
        <tr>
          <th>Remark</th>
          <td>{{ $expense->remark }}</td>
        </tr>
      </table>
      <br><br><br>
      <table class="table table-dark">
        <tr>
          <th>Created At</th>
          <td>{{ $expense->created_at }}</td>
        </tr>
        <tr>
          <th>Created By</th>
          <td>{{ $expense->created_by }}</td>
        </tr>
        <tr>
          <th>Updated At</th>
          <td>{{ $expense->updated_at }}</td>
        </tr>
        <tr>
          <th>Updated By</th>
          <td>{{ $expense->updated_by }}</td>
        </tr>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif
    <a href="{{ url('expense') }}" class="btn btn-danger btn-md">Back to Expense List</a>
  </div>
  <div id="detailModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          @if ($expense->transportationFlag)
            <iframe id="expenseDetailIframe" src="{{ url('transportation/' . $expense->transportationId) }}"></iframe>
          @elseif ($expense->shoppingFlag)
          @else
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
