<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
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
      $users_list = User::orderBy('id', 'asc')->paginate(5);
      $size = User::all()->count();
      $data = [
        'list' => $users_list,
        'size' => $size
      ];
      return view('users/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  User user
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        return view('users/show', compact('users'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Approve/Disapprove an user
     *
     * @param  User users
     * @return \Illuminate\Http\Response
     */
     public function change_approval(User $users)
     {
       $is_approved = false;
       if(!is_null($users->is_approved) && $users->is_approved != '' && $users->is_approved == 1)  {
         $users->is_approved = 0;
       } else {
         $is_approved = true;
         $users->is_approved = 1;
       }
       $users->save();

       if($is_approved) {
         Session::flash('flash_message', 'User ' . $users->name . ' successfully approved');
       } else {
         Session::flash('flash_message', 'User ' . $users->name . ' successfully disapproved');
       }

       return redirect('users');
     }
}
