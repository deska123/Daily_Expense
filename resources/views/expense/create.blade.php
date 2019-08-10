@extends('../template')

@section('content')
  <br><br><br>
  <h2>Create New Expense</h2>
  <hr>
  <form action="{{ url('expense') }}" method="POST">
    @csrf
    @include('expense/form', ['formType' => 'Create', 'submitButtonType' => 'Create'])
  </form>
@endsection
