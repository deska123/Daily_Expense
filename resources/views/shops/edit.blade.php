@extends('../template')

@section('content')
  <br><br><br>
  <h2>Edit Shop</h2>
  <hr>
  <form action="{{ url('shops/' . $shop->id) }}" method="POST">
    @csrf
    @method('PATCH')
    @include('shops/form', ['formType' => 'Edit', 'submitButtonType' => 'Edit'])
  </form>
@endsection
