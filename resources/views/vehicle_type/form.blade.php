<div class="form-group">
  <label for="type">Type</label>
  <input type="text" class="form-control" id="type" placeholder="Enter Vehicle Type" name="type" value="{{$formType == 'Edit' ? $vehicle_type->type : ''}}">
  @if ($errors->has('type'))
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{$errors->first('type')}}</strong>
  </div>
  @endif
</div>
<button type="submit" class="btn btn-primary">{{$submitButtonType}}</button>
<a href="{{url('vehicle_type')}}" class="btn btn-danger btn-md">Cancel</a>
