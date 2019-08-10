@extends('../template')

@section('content')
  <br><br><br>
  <div id="expense">
    <h2>Expense</h2>
    @include('_partial/flash_message')
    @if (!empty($data['size']) && $data['size'] > 0)
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Seq</th>
            <th>Category</th>
            <th>Cost Total</th>
            <th>Activity Date Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            if($data['list']->onFirstPage()) {
              $a = 1;
            } else {
              $a = (($data['list']->currentPage() - 1) * $data['list']->perPage()) + 1;
            }
          @endphp
          @foreach ($data['list'] as $expense)
            <tr>
              <td>{{ $a }}</td>
              @if ($expense->transportationFlag)
                <td>Transportation</td>
              @elseif ($expense->shoppingFlag)
                <td>Shopping</td>
              @else
                <td>Others</td>
              @endif
              <td>{{ $expense->costTotal }}</td>
              <td>{{ $expense->activityDateTime }}</td>
              <td>
                <a href="{{url('expense/' . $expense->id)}}" class="btn btn-secondary btn-md">Details</a>
              </td>
            </tr>
            @php $a++; @endphp
          @endforeach
        </tbody>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif

    <div class="row">
     <div class="col-sm-4"></div>
     <div class="col-sm-4">{{ $data['list'] -> links() }}</div>
     <div class="col-sm-4"></div>
    </div>

    @if (!empty($data['size']) && $data['size'] > 0)
      <h4>Total Number of Data : {{ $data['size'] }}</h4>
    @endif

    <a href="{{ url('expense/create') }}" class="btn btn-link btn-md">Create New Expense</a>
  </div>
@stop
