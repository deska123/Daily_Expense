<div class="form-group">
  <label for="category">Category</label>
  <select class="form-control" id="category" name="category">
    @if (!empty($category_list))
      @foreach ($category_list as $category)
        @if ($formType == 'Edit')

        @else
            <option value="{{ $category }}">{{ $category }}</option>
        @endif
      @endforeach
    @endif
  </select>
</div>
<div id="transportation" class="form-group">
  <span>Transportation</span>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th></th>
        <th>Vehicle Type</th>
        <th>Origin</th>
        <th>Destination</th>
        <th>Fleet</th>
      </tr>
    </thead>
    <tbody>
      @if (!empty($transportation_list))
        @foreach ($transportation_list as $transportation)
          <tr>
          @if ($formType == 'Edit')

          @else
            <td><input type="radio" name="transportationId" value="{{ $transportation->id }}"></td>
          @endif
            <td>{{ $transportation->vehicleType->type }}</td>
            <td>{{ $transportation->origin }}</td>
            <td>{{ $transportation->destination }}</td>
            <td>{{ $transportation->fleet }}</td>
            </tr>
        @endforeach
      @endif
    </tbody>
  </table>
</div>
<div id="others" class="form-group">
  <label for="othersId">Others</label>
  <select class="form-control" id="othersId" name="othersId">
    @if (!empty($others_list))
      @foreach ($others_list as $other)
        @if ($formType == 'Edit')

        @else
            <option value="{{ $other->id }}"></option>
        @endif
      @endforeach
    @endif
  </select>
</div>
<div class="form-group">
  <label for="type">Cost Total</label>
  <input type="number" class="form-control" id="costTotal" placeholder="Enter Cost Total" name="costTotal" value="{{$formType == 'Edit' ? $expense->costTotal : ''}}">
  @if ($errors->has('costTotal'))
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{$errors->first('costTotal')}}</strong>
  </div>
  @endif
</div>
<div class="form-group">
  <label for="type">Activity Date Time</label>
  <input type="datetime-local" class="form-control" id="activityDateTime" placeholder="Enter Activity Date Time" name="activityDateTime" value="{{$formType == 'Edit' ? $expense->activityDateTime : ''}}">
  @if ($errors->has('activityDateTime'))
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{$errors->first('activityDateTime')}}</strong>
  </div>
  @endif
</div>
<div class="form-group">
  <label for="remark">Remark</label>
  <input type="text" class="form-control" id="remark" placeholder="Enter Remark" name="remark" value="{{$formType == 'Edit' ? $expense->remark : ''}}">
</div>

@if ($formType == 'Edit')
  <input type="hidden" id="updated_by" name="updated_by" value="{{ Auth::id() }}">
@else
  <input type="hidden" id="created_by" name="created_by" value="{{ Auth::id() }}">
  <input type="hidden" id="updated_by" name="updated_by" value="{{ Auth::id() }}">
@endif

<button type="submit" class="btn btn-primary">{{$submitButtonType}}</button>
<a href="{{ url('expense') }}" class="btn btn-danger btn-md">Cancel</a>
