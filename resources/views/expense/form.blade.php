<div class="form-group">
  <label for="category">Category</label>
  <select class="form-control" id="category" name="category">
    @if (!empty($category_list))
      @foreach ($category_list as $category)
        @if ($formType == 'Edit')
          @if ($expense->transportationFlag)
            @if ($category == 'Transportation')
              <option value="{{ $category }}" selected>{{ $category }}</option>
            @endif
          @elseif ($expense->shoppingFlag)
            @if ($category == 'Shopping')
              <option value="{{ $category }}" selected>{{ $category }}</option>
            @endif
          @else
            @if ($category == 'Others')
              <option value="{{ $category }}" selected>{{ $category }}</option>
            @else
              <option value="{{ $category }}">{{ $category }}</option>
            @endif
          @endif
        @else
            <option value="{{ $category }}">{{ $category }}</option>
        @endif
      @endforeach
    @endif
  </select>
  @error('category')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{ $message }}</strong>
    </div>
  @enderror
  @error('transportationId')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{ $message }}</strong>
    </div>
  @enderror
</div>
<div id="transportationSection" class="form-group">
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
              @if (isset($expense->transportationId))
                @if ($transportation->id == $expense->transportationId)
                  <td><input type="radio" id="transportationId" name="transportationId" value="{{ $transportation->id }}" checked></td>
                @else
                  <td><input type="radio" id="transportationId" name="transportationId" value="{{ $transportation->id }}"></td>
                @endif
              @endif
            @else
              <td><input type="radio" id="transportationId" name="transportationId" value="{{ $transportation->id }}"></td>
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
<div id="shoppingSection" class="form-group">
</div>
<div id="othersSection" class="form-group">
  <label for="othersId">Others</label>
  <select class="form-control" id="othersId" name="othersId">
    @if (!empty($others_list))
      @foreach ($others_list as $other)
        @if ($formType == 'Edit')
          @if ($other->id == $expense->othersId)
            <option value="{{ $other->id }}" selected>{{ $other->remark }}</option>
          @endif
        @else
          <option value="{{ $other->id }}">{{ $other->remark }}</option>
        @endif
      @endforeach
    @endif
  </select>
</div>
<div class="form-group">
  <label for="type">Cost Total</label>
  <input type="number" class="form-control" id="costTotal" placeholder="Enter Cost Total" name="costTotal" value="{{$formType == 'Edit' ? $expense->costTotal : ''}}">
  @error('costTotal')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{ $message }}</strong>
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="type">Activity Date</label>
  <input type="date" class="form-control" id="activityDate" placeholder="Enter Activity Date" name="activityDate" value="{{$formType == 'Edit' ? date('Y-m-d', strtotime($expense->activityDate)) : ''}}">
  @error('activityDate')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{ $message }}</strong>
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="type">Activity Time</label>
  <input type="time" class="form-control" id="activityTime" placeholder="Enter Activity Time" name="activityTime" value="{{$formType == 'Edit' ? $expense->activityTime : ''}}">
  @error('activityTime')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{ $message }}</strong>
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="receipt">
    Receipt
    @if ($formType == 'Edit')
      @if (isset($expense->receipt))
        <a href="{{ asset($expense->receipt) }}" target="_blank" class="btn btn-warning btn-md">See Receipt File</a>
      @endif
    @endif
  </label>
  <input type="file" class="form-control" id="receipt" name="receipt">
  @error('receipt')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{ $message }}</strong>
    </div>
  @enderror
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
