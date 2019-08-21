<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{$formType == 'Edit' ? $good->name : ''}}">
  @error('name')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{$errors->first('name')}}</strong>
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="price">Price</label>
  <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{$formType == 'Edit' ? $good->price : ''}}">
  @error('price')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{$errors->first('price')}}</strong>
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="remark">Remark</label>
  <input type="text" class="form-control" id="remark" placeholder="Enter Remark" name="remark" value="{{$formType == 'Edit' ? $good->remark : ''}}">
  @error('remark')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{$errors->first('remark')}}</strong>
    </div>
  @enderror
</div>
<div class="form-group">
  @if ($formType == 'Edit')
    <input type="hidden" id="updated_by" name="updated_by" value="{{ Auth::id() }}">
  @else
    <input type="hidden" id="created_by" name="created_by" value="{{ Auth::id() }}">
    <input type="hidden" id="updated_by" name="updated_by" value="{{ Auth::id() }}">
  @endif
</div>
<button type="submit" class="btn btn-primary">{{$submitButtonType}}</button>
<a href="{{ url('goods') }}" class="btn btn-danger btn-md">Cancel</a>
