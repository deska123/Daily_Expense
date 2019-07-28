@extends('../template')

@section('content')
<br><br><br>
<div id="transportation">
  <h2>Transportation</h2>
  @include('_partial/flash_message')
  @if (!empty($data['list']))
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
            <th>Seq</th>
            <th>Vehicle Type</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Fleet</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if($data['list']->onFirstPage()) {
          $a = 1;
        } else {
          $a = (($data['list']->currentPage() - 1) * $data['list']->perPage()) + 1;
        }
      ?>
      <?php foreach($data['list'] as $transportation): ?>
      <tr>
        <td>{{ $a }}</td>
        <td>{{ $transportation->vehicleType->type }}</td>
        <td>{{ $transportation->origin }}</td>
        <td>{{ $transportation->destination }}</td>
        <td>{{ $transportation->fleet }}</td>
        
        </tr>
      <?php $a++ ?>
      <?php endforeach ?>
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

@endsection
