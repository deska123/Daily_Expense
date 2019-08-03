@extends('../template')

@section('content')
  <br><br><br>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Dashboard</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                  @if (is_null(Auth::user()->email_verified_at))
                    <div class="alert alert-danger">
                      You haven't verified your email. Please check your inbox/junk of your email and click the verification link
                    </div>
                  @else
                    @if (Auth::user()->is_approved == 0)
                      <div class="alert alert-warning">
                        Your account haven't been approved. Please contact this website administrator for next step.
                      </div>
                    @else
                      <div class="alert alert-success">
                        <strong>Welcome to our system !</strong>
                      </div>
                    @endif
                  @endif
              </div>
          </div>
      </div>
  </div>
@endsection
