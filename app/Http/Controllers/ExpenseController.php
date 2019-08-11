<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Http\Requests\ExpenseRequest;
use Session;
use Storage;

class ExpenseController extends Controller
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
      $expense_list = Expense::orderBy('id', 'asc')->paginate(5);
      $size = Expense::all()->count();
      $data = [
        'list' => $expense_list,
        'size' => $size
      ];
      return view('expense/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('expense/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ExpenseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
      //Expense::create($request->all());
      //Session::flash('flash_message', 'Expense Data successfully created');
      //return redirect('expense')
      $expense = new Expense;
      switch($request->input('category')) {
        case 'Transportation' :
          $expense->transportationFlag = true;
          $expense->transportationId = $request->transportationId;
          break;
        case 'Shopping' :
          break;
        case 'Others' :
          break;
      }
      $expense->costTotal = $request->costTotal;
      $expense->activityDateTime = $request->activityDateTime;
      if($request->hasFile('receipt')) {
        $receipt = $request->file('receipt');
        $extension = $receipt->getClientOriginalExtension();
        if($request->file('receipt')->isValid()) {
          $receipt_name = date('YmdHis') . ".$extension";
          $upload_path = 'upload/receipts';
          $request->file('receipt')->move($upload_path, $receipt_name);
          $expense->receipt = $upload_path . '/' . $receipt_name;
        }
      }
      if($request->filled('remark')) {
        $expense->remark = $request->remark;
      }
      $expense->created_by = $request->created_by;
      $expense->updated_by = $request->updated_by;
      $expense->save();
      Session::flash('flash_message', 'Expense Data successfully created');
      return redirect('expense');
    }

    /**
     * Display the specified resource.
     *
     * @param  Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
      return view('expense/show', compact('expense'));
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
}
