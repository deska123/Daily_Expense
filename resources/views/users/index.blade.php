@extends('../template')

@section('content')
  <br><br><br>
  <div id="users">
    <h2>Users</h2>
    @include('_partial/flash_message')
    @if (!empty($data['size']) && $data['size'] > 0)
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Seq</th>
            <th>Id</th>
            <th>Name</th>
            <th>Level</th>
            <th>Email Verified ?</th>
            <th>Approved ?</th>
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
          <?php foreach($data['list'] as $user): ?>
          <tr>
            <td>{{ $a }}</td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->level }}</td>
            <td>{{ !is_null($user->email_verified_at) && $user->email_verified_at != '' ? "Yes" : "No" }}</td>
            <td>{{ !is_null($user->is_approved) && $user->is_approved != '' && $user->is_approved == 1 ? "Yes" : "No" }}</td>
            <td>
              @if (!is_null($user->is_approved) && $user->is_approved != '' && $user->is_approved == 1)
                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#changeApprovalStatusModal_{{ $user->id }}">Disapprove</button>
              @else
                <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#changeApprovalStatusModal_{{ $user->id }}">Approve</button>
              @endif
              <a href="{{ url('users/' . $user->id) }}" class="btn btn-secondary btn-md">Details</a>
            </td>
            <div id="changeApprovalStatusModal_{{ $user->id }}" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    @if (!is_null($user->is_approved) && $user->is_approved != '' && $user->is_approved == 1)
                      <h4 class="modal-title">Disapproval Confirmation</h4>
                    @else
                      <h4 class="modal-title">Approval Confirmation</h4>
                    @endif
                  </div>
                  <div class="modal-body">
                    @if (!is_null($user->is_approved) && $user->is_approved != '' && $user->is_approved == 1)
                      <p>Are you sure you want to disapprove this user ?</p>
                    @else
                      <p>Are you sure you want to approve this user ?</p>
                    @endif
                  </div>
                  <div class="modal-footer">
                    <form action="{{ url('users/' . $user->id . '/approve') }}" method="POST">
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

    <div class="row">
     <div class="col-sm-4"></div>
     <div class="col-sm-4">{{ $data['list'] -> links() }}</div>
     <div class="col-sm-4"></div>
    </div>

    @if (!empty($data['size']) && $data['size'] > 0)
      <h4>Total Number of Data : {{ $data['size'] }}</h4>
    @endif
  </div>
@stop
