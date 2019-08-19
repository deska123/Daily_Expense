@extends('../template')

@section('content')
  <br><br><br>
  <h2>Create New Shop</h2>
  <hr>
  <form action="{{ url('shops') }}" method="POST">
    @csrf
    @include('shops/form', ['formType' => 'Create', 'submitButtonType' => 'Create'])
  </form>
@endsection
