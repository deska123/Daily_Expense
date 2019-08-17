@extends('../template')

@section('content')
  <br><br><br>
  <h2>Edit Expense</h2>
  <hr>
  <form action="{{ url('expense/' . $expense->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @include('expense/form', ['formType' => 'Edit', 'submitButtonType' => 'Edit'])
  </form>
@endsection
