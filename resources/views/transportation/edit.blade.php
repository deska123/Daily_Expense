@extends('../template')

@section('content')
  <br><br><br>
  <h2>Edit Transportation</h2>
  <hr>
  <form action="{{ url('transportation/' . $transportation->id) }}" method="POST">
    @csrf
    @method('PATCH')
    @include('transportation/form', ['formType' => 'Edit', 'submitButtonType' => 'Edit'])
  </form>
@endsection
