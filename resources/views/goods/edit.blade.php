@extends('../template')

@section('content')
  <br><br><br>
  <h2>Edit Good</h2>
  <hr>
  <form action="{{ url('goods/' . $good->id) }}" method="POST">
    @csrf
    @method('PATCH')
    @include('goods/form', ['formType' => 'Edit', 'submitButtonType' => 'Edit'])
  </form>
@endsection
