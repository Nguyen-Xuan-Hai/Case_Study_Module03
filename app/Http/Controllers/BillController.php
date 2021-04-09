<?php

namespace App\Http\Controllers;

use App\Http\Services\BillService;
use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected BillService $billService;
    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    public function showTable(){
        $bills = $this->billService->getAll();
        $customers = Customer::all();
        $users = User::paginate(3);
        return view('backend.admin.bills.table',compact('bills','customers','users'));
    }

    public function index(){
        $bills = $this->billService->getAll();
        return view('backend.admin.bills.list',compact('bills'));
    }

    function edit($id){
        $bill = $this->billService->findById($id);

        return view('backend.admin.bills.edit',compact('bill'));
    }

    function update($id,Request $request){
//        dd($request,$id);
        $this->billService->update($id,$request);
        toastSuccess('Update Successfully!');

        return redirect()->route('bills.index');
    }


    function showBill($id){
//        dd($id);
        $bill = $this->billService->findById($id);
        return view('backend.admin.bills.bill-detail',compact('bill'));

    }


}
