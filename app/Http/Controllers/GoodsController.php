<?php

namespace App\Http\Controllers;

use App\Goods;
use App\Http\Requests\GoodsRequest;
use Session;

class GoodsController extends Controller
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
        $goods_list = Goods::orderBy('id', 'asc')->paginate(5);
        $size = Goods::all()->count();
        $data = [
          'list' => $goods_list,
          'size' => $size
        ];
        return view('goods/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goods/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\GoodsRequest  $goodsRequest
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsRequest $goodsRequest)
    {
        Goods::create($goodsRequest->all());
        Session::flash('flash_message', 'Good Data : ' . $goodsRequest->name . ' successfully created');
        return redirect('goods');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Goods $good
     * @return \Illuminate\Http\Response
     */
    public function show(Goods $good)
    {
        return view('goods/show', compact('good'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Goods $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Goods $good)
    {
        return view('goods/edit', compact('good'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\GoodsRequest $goodsRequest
     * @param  App\Goods
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsRequest $goodsRequest, Goods $good)
    {
        $good->fill($goodsRequest->except(['_token', '_method']));
        $good->save();
        Session::flash('flash_message', 'Good Data with ID : ' . $good->id . ' successfully edited');
        return redirect('goods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Goods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goods $good)
    {
        $good->delete();
        Session::flash('flash_message', 'Good Data successfully deleted');
        return redirect('goods');
    }
}
