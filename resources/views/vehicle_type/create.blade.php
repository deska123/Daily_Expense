@extends('../template')

@section('content')
  <br><br><br>
  <h2>Create New Vehicle Type</h2>
  <hr>
  <form action="{{ url('vehicle_type/store') }}" method="POST">
    @csrf
    @include('vehicle_type/form', ['formType' => 'Create', 'submitButtonType' => 'Create'])
  </form>
@endsection
