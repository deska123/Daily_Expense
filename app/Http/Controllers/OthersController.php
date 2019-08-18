<?php

namespace App\Http\Controllers;

use App\Others;
use App\Http\Requests\OthersRequest;
use Session;

class OthersController extends Controller
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
      $others_list = Others::orderBy('id', 'asc')->paginate(5);
      $size = Others::all()->count();
      $data = [
        'list' => $others_list,
        'size' => $size
      ];
      return view('others/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('others/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\OthersRequest $othersRequest
     * @return \Illuminate\Http\Response
     */
    public function store(OthersRequest $othersRequest)
    {
      Others::create($othersRequest->all());
      Session::flash('flash_message', 'Others Data : ' . $othersRequest->remark . ' successfully created');
      return redirect('others');
    }

    /**
     * Display the specified resource.
     *
     * @param Others $other
     * @return \Illuminate\Http\Response
     */
    public function show(Others $other)
    {
      return view('others/show', compact('other'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Others $other
     * @return \Illuminate\Http\Response
     */
    public function edit(Others $other)
    {
      return view('others/edit', compact('other'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OthersRequest $othersRequest
     * @param Others $other
     * @return \Illuminate\Http\Response
     */
    public function update(OthersRequest $othersRequest, Others $other)
    {
      $other->fill($othersRequest->except(['_token', '_method']));
      $other->save();
      Session::flash('flash_message', 'Others Data with ID : ' . $other->id . ' successfully edited');
      return redirect('others');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Others $other
     * @return \Illuminate\Http\Response
     */
    public function destroy(Others $other)
    {
      $other->delete();
      Session::flash('flash_message', 'Others Data successfully deleted');
      return redirect('others');
    }
}
