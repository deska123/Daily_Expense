@extends('../template')

@section('content')
  <br><br><br>
  <h2>Create New Shopping</h2>
  <hr>
  <form action="{{ url('shopping') }}" method="POST">
    @csrf
    @include('shopping/form', ['formType' => 'Create', 'submitButtonType' => 'Create'])
  </form>
@endsection
