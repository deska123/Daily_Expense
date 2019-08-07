<div class="form-group">
  <label for="type">Type</label>
  <input type="text" class="form-control" id="type" placeholder="Enter Vehicle Type" name="type" value="{{$formType == 'Edit' ? $vehicle_type->type : ''}}">
  @if ($errors->has('type'))
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{$errors->first('type')}}</strong>
  </div>
  @endif

  @if ($formType == 'Edit')
    <input type="hidden" id="updated_by" name="updated_by" value="{{ Auth::id() }}">
  @else
    <input type="hidden" id="created_by" name="created_by" value="{{ Auth::id() }}">
    <input type="hidden" id="updated_by" name="updated_by" value="{{ Auth::id() }}">
  @endif
</div>
<button type="submit" class="btn btn-primary">{{$submitButtonType}}</button>
<a href="{{ url('vehicle_type') }}" class="btn btn-danger btn-md">Cancel</a>
