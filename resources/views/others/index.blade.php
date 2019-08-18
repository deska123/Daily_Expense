@extends('../template')

@section('content')
  <br><br><br>
  <div id="others">
    <h2>Others</h2>
    @include('_partial/flash_message')
    @if (!empty($data['size']) && $data['size'] > 0)
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Seq</th>
            <th>Remark</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            if($data['list']->onFirstPage()) {
              $a = 1;
            } else {
              $a = (($data['list']->currentPage() - 1) * $data['list']->perPage()) + 1;
            }
          @endphp
          @foreach ($data['list'] as $others)
            <tr>
              <td>{{ $a }}</td>
              <td>{{ $others->remark }}</td>
              <td>
                <a href="{{ url('others/' . $others->id) }}" class="btn btn-secondary btn-md">Details</a>
                <a href="{{ url('others/' . $others->id . '/edit') }}" class="btn btn-info btn-md">Edit</a>
                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#deleteOthersModal_{{ $others->id }}">Delete</button>
              </td>
              <div id="deleteOthersModal_{{ $others->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Confirmation</h4>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('others/' . $others->id) }}" method="POST">
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
            @php $a++; @endphp
          @endforeach
        </tbody>
      </table>
    @else
      <p>No data to be displayed !</p>
    @endif

    <div class="row">
     <div class="col-sm-4"></div>
     <div class="col-sm-4">{{ $data['list'] -> links() }}</div>
     <div class="col-sm-4"></div>
    </div>

    @if (!empty($data['size']) && $data['size'] > 0)
      <h4>Total Number of Data : {{ $data['size'] }}</h4>
    @endif

    <a href="{{ url('others/create') }}" class="btn btn-link btn-md">Create New Others</a>
  </div>
@stop
