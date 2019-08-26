<div class="form-group">
  <label for="shopsId">Shop</label>
  <select class="form-control" id="shopsId" name="shopsId">
    @if (!empty($shops_list))
      @foreach ($shops_list as $shop)
        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
      @endforeach
    @endif
  </select>
  @error('shopsId')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{$errors->first('shopsId')}}</strong>
    </div>
  @enderror
</div>
<div class="form-group">
  <span>Goods</span>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Qty</th>
        <th>Remark</th>
      </tr>
    </thead>
    <tbody id="goodsShoppingContent">
      <tr id="defaultGoodsRow">
        <td>
          @if (!empty($goods_list))
            <select class="form-control" name="goodsId[]">
              @foreach ($goods_list as $good)
                <option value="{{ $good->id }}">{{ $good->name }}</option>
              @endforeach
            </select>
          @endif
        </td>
        <td><input type="number" class="form-control" placeholder="Enter Quantity" name="qty[]"></td>
        <td><input type="text" class="form-control" placeholder="Enter Remark" name="remark[]"></td>
      </tr>
    </tbody>
  </table>
  @error('goodsId.*')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{$errors->first('goodsId.*')}}</strong>
    </div>
  @enderror
  @error('qty.*')
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{$errors->first('qty.*')}}</strong>
    </div>
  @enderror
  <a href="#" id="addGoodRowButton" class="btn btn-secondary">Add Row</a>
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
<a href="{{ url('shopping') }}" class="btn btn-danger btn-md">Cancel</a>
