@extends('../template')

@section('main')
  <br><br><br>
  <h2>Edit Vehicle Type</h2>
  <hr>
  <form action="{{url('vehicle_type/' . $vehicle_type->id)}}" method="POST">
    @csrf
    @method('PATCH')
    @include('vehicle_type/form', ['formType' => 'Edit', 'submitButtonType' => 'Edit'])
  </form>
@stop
