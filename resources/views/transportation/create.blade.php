@extends('../template')

@section('content')
  <br><br><br>
  <h2>Create New Transportation</h2>
  <hr>
  <form action="{{ url('transportation') }}" method="POST">
    @csrf
    @include('transportation/form', ['formType' => 'Create', 'submitButtonType' => 'Create'])
  </form>
@endsection
