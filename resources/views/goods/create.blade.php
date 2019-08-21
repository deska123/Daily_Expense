@extends('../template')

@section('content')
  <br><br><br>
  <h2>Create New Good</h2>
  <hr>
  <form action="{{ url('goods') }}" method="POST">
    @csrf
    @include('goods/form', ['formType' => 'Create', 'submitButtonType' => 'Create'])
  </form>
@endsection
