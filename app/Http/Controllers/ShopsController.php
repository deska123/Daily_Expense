<?php

namespace App\Http\Controllers;

use App\Shops;
use App\Http\Requests\ShopsRequest;
use Session;

class ShopsController extends Controller
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
        $shops_list = Shops::orderBy('id', 'asc')->paginate(5);
        $size = Shops::all()->count();
        $data = [
          'list' => $shops_list,
          'size' => $size
        ];
        return view('shops/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ShopsRequest  $shopsRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ShopsRequest $shopsRequest)
    {
        Shops::create($shopsRequest->all());
        Session::flash('flash_message', 'Shop Data : ' . $shopsRequest->name . ' successfully created');
        return redirect('shops');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Shops $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shops $shop)
    {
        return view('shops/show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Shops $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shops $shop)
    {
        return view('shops/edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ShopsRequest $shopsRequest
     * @param  App\Shops
     * @return \Illuminate\Http\Response
     */
    public function update(ShopsRequest $shopsRequest, Shops $shop)
    {
        $shop->fill($shopsRequest->except(['_token', '_method']));
        $shop->save();
        Session::flash('flash_message', 'Shop Data with ID : ' . $shop->id . ' successfully edited');
        return redirect('shops');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Shops $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shops $shop)
    {
        $shop->delete();
        Session::flash('flash_message', 'Shop Data successfully deleted');
        return redirect('shops');
    }
}
