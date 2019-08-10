<?php

namespace App\Http\Controllers;

use App\Transportation;
use App\Http\Requests\TransportationRequest;
use Illuminate\Http\Request;
use Session;

class TransportationController extends Controller
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
      $transportation_list = Transportation::orderBy('id', 'asc')->paginate(5);
      $size = Transportation::all()->count();
      $data = [
        'list' => $transportation_list,
        'size' => $size
      ];
      return view('transportation/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transportation/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TransportationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransportationRequest $transportationRequest)
    {
      Transportation::create($transportationRequest->all());
      Session::flash('flash_message', 'Transportation Data successfully created');
      return redirect('transportation');
    }

    /**
     * Display the specified resource.
     *
     * @param  Transportation $transportation
     * @return \Illuminate\Http\Response
     */
    public function show(Transportation $transportation)
    {
      return view('transportation/show', compact('transportation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Transportation $transportation
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportation $transportation)
    {
      return view('transportation/edit', compact('transportation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\TransportationRequest $request
     * @param  Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function update(TransportationRequest $request, Transportation $transportation)
    {
      $transportation->fill($request->except(['_token', '_method']));
      $transportation->save();
      Session::flash('flash_message', 'Transportation Data successfully edited');
      return redirect('transportation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Transportation $transportation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportation $transportation)
    {
      $transportation->delete();
      Session::flash('flash_message', 'Transportation Data successfully deleted');
      return redirect('transportation');
    }
}
