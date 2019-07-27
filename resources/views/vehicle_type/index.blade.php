@extends('../template')

@section('main')
  <br><br><br>
  <div id="vehicleType">
    <h2>Vehicle Type</h2>
    @include('_partial/flash_message')
    @if (!empty($data['list']))
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Seq</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $a = 1 ?>
          <?php foreach($data['list'] as $vehicleType): ?>
          <tr>
            <td>{{$a}}</td>
            <td>{{$vehicleType -> type}}</td>
            <td>
              <a href="{{url('vehicle_type/' . $vehicleType -> id)}}" class="btn btn-secondary btn-md">Details</a>
              <a href="{{url('vehicle_type/' . $vehicleType -> id . '/edit')}}" class="btn btn-info btn-md">Edit</a>
              <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#deleteVehicleTypeModal_{{$vehicleType -> id}}">Delete</button>
            </td>
            <div id="deleteVehicleTypeModal_{{$vehicleType -> id}}" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete this data ?</p>
                  </div>
                  <div class="modal-footer">
                      <form action="{{url('vehicle_type/' . $vehicleType -> id)}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                  </div>
                </div>
              </div>
            </div>
          </tr>
          <?php $a++ ?>
          <?php endforeach ?>
        </tbody>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif

    @if (!empty($data['size']))
      <h4>Number of rows : {{ $data['size'] }}</h4>
    @else
      <h4>Number of rows : 0</h4>
    @endif

    <a href="{{url('vehicle_type/create')}}" class="btn btn-link btn-md">Create New Vehicle Type</a>
  </div>
@stop
