@extends('../template')

@section('content')
  <br><br><br>
  <h2>Edit Others</h2>
  <hr>
  <form action="{{ url('others/' . $other->id) }}" method="POST">
    @csrf
    @method('PATCH')
    @include('others/form', ['formType' => 'Edit', 'submitButtonType' => 'Edit'])
  </form>
@endsection
