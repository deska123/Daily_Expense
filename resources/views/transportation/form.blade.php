<div class="form-group">
  <label for="vehicleTypeId">Vehicle Type</label>
  <select class="form-control" id="vehicleTypeId" name="vehicleTypeId">
    @if (!empty($vehicle_type_list))
      @foreach ($vehicle_type_list as $vehicle_type_opt)
        @if ($formType == 'Edit')
          @if ($vehicle_type_opt->id == $transportation->vehicleTypeId)
            <option value="{{ $vehicle_type_opt->id }}" selected>{{ $vehicle_type_opt->type }}</option>
          @endif
        @else
            <option value="{{ $vehicle_type_opt->id }}">{{ $vehicle_type_opt->type }}</option>
        @endif
      @endforeach
    @endif
  </select>
</div>
<div class="form-group">
  <label for="type">Origin</label>
  <input type="text" class="form-control" id="origin" name="origin" placeholder="Enter Origin" value="{{$formType == 'Edit' ? $transportation->origin : ''}}">
  @if ($errors->has('origin'))
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{$errors->first('origin')}}</strong>
  </div>
  @endif
</div>
<div class="form-group">
  <label for="type">Destination</label>
  <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter Destination" value="{{$formType == 'Edit' ? $transportation->destination : ''}}">
  @if ($errors->has('destination'))
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{$errors->first('destination')}}</strong>
  </div>
  @endif
</div>
<div class="form-group">
  <label for="type">Code</label>
  <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code" value="{{$formType == 'Edit' ? $transportation->code : ''}}">
</div>
<div class="form-group">
  <label for="type">Fleet</label>
  <input type="text" class="form-control" id="fleet" name="fleet" placeholder="Enter Fleet" value="{{$formType == 'Edit' ? $transportation->fleet : ''}}">
  @if ($errors->has('fleet'))
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{$errors->first('fleet')}}</strong>
  </div>
  @endif
</div>
<div class="form-group">
  <label for="type">Remark</label>
  <input type="text" class="form-control" id="remark" name="remark" placeholder="Enter Remark" value="{{$formType == 'Edit' ? $transportation->remark : ''}}">
</div>
@if ($formType == 'Edit')
  <input type="hidden" id="updated_by" name="updated_by" value="{{ Auth::id() }}">
@else
  <input type="hidden" id="created_by" name="created_by" value="{{ Auth::id() }}">
  <input type="hidden" id="updated_by" name="updated_by" value="{{ Auth::id() }}">
@endif
<button type="submit" class="btn btn-primary">{{$submitButtonType}}</button>
<a href="{{ url('transportation') }}" class="btn btn-danger btn-md">Cancel</a>
