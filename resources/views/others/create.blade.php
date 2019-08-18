@extends('../template')

@section('content')
  <br><br><br>
  <h2>Create New Others</h2>
  <hr>
  <form action="{{ url('others') }}" method="POST">
    @csrf
    @include('others/form', ['formType' => 'Create', 'submitButtonType' => 'Create'])
  </form>
@endsection
