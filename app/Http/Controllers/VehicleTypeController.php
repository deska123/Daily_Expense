<?php

namespace App\Http\Controllers;

use App\Vehicle_Type;
use App\Http\Requests\VehicleTypeRequest;
use Illuminate\Support\Facades\Auth;
use Session;

class VehicleTypeController extends Controller
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
      $vehicleType_list = Vehicle_Type::orderBy('id', 'asc')->paginate(5);
      $size = Vehicle_Type::all()->count();
      $data = [
        'list' => $vehicleType_list,
        'size' => $size
      ];
      return view('vehicle_type/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle_type/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\VehicleTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleTypeRequest $request)
    {
      Vehicle_Type::create($request->all());
      Session::flash('flash_message', 'Vehicle Type Data : ' . $request->type . ' successfully created');
      return redirect('vehicle_type');
    }

    /**
     * Display the specified resource.
     *
     * @param  Vehicle_Type  $vehicle_type
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle_Type $vehicle_type)
    {
      return view('vehicle_type/show', compact('vehicle_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Vehicle_Type  $vehicle_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle_Type $vehicle_type)
    {
      return view('vehicle_type/edit', compact('vehicle_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\VehicleTypeRequest  $request
     * @param  Vehicle_Type  $vehicle_type
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleTypeRequest $request, Vehicle_Type $vehicle_type)
    {
      $vehicle_type->fill($request->except(['_token', '_method']));
      $vehicle_type->save();
      Session::flash('flash_message', 'Vehicle Type Data : ' . $request->type . ' successfully edited');
      return redirect('vehicle_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Vehicle_Type  $vehicle_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle_Type $vehicle_type)
    {
        $vehicle_type->delete();
        Session::flash('flash_message', 'Vehicle Type Data successfully deleted');
        return redirect('vehicle_type');
    }
}
