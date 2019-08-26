<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Goods;
use App\Shopping;
use App\Shopping_Details;
use App\Http\Requests\ShoppingRequest;
use Illuminate\Http\Request;
use Session;


class ShoppingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('approved');
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopping_list = Shopping::orderBy('id', 'asc')->paginate(5);
        $size = Shopping::all()->count();
        $data = [
          'list' => $shopping_list,
          'size' => $size
        ];
        return view('shopping/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shopping/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ShoppingRequest $shoppingRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ShoppingRequest $shoppingRequest)
    {
        $shopping = Shopping::create($shoppingRequest->all());

        foreach( $shoppingRequest->goodsId as $index => $goodsId_s ) {
          $shopping_detail = new Shopping_Details;
          $shopping_detail->shoppingId = $shopping->id;
          $shopping_detail->shopsId = $shoppingRequest->shopsId;
          $shopping_detail->goodsId = $shoppingRequest->goodsId[$index];
          $shopping_detail->qty = $shoppingRequest->qty[$index];
          $shopping_detail->remark = $shoppingRequest->remark[$index];
          $shopping_detail->created_by = $shoppingRequest->created_by;
          $shopping_detail->updated_by = $shoppingRequest->updated_by;
          $shopping_detail->save();
        }

        Session::flash('flash_message', 'Shopping Data : successfully created');
        return redirect('shopping');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Shopping $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping $shopping)
    {
        $shoppingDetails = $shopping->shoppingDetails;

        $expenseTotal = 0;
        $goodsId = $shoppingDetails->pluck('goodsId');
        $quantities = $shoppingDetails->pluck('qty');
        foreach($goodsId as $index => $goodId) {
          $goods = Goods::all()->whereIn('id', $goodId)->pluck('price');
          $expenseTotal += $goods[0] * $quantities[$index];
        }

        return view('shopping/show', compact('shopping', 'expenseTotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Shopping $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping $shopping)
    {
        $count = Expense::where('shoppingFlag', true)->whereNotNull('shoppingId')->where('shoppingId', $shopping->id)->count();
        if($count > 0) {
          $expense = Expense::where('shoppingFlag', true)->where('shoppingId', $shopping->id)->firstOrFail();
          $expense->delete();
        }

        $shopping->delete();
        Session::flash('flash_message', 'Shopping Data successfully deleted');
        return redirect('shopping');
    }
}
