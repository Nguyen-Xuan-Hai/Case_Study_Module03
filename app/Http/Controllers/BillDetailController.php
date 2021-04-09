<?php

namespace App\Http\Controllers;

use App\Http\Services\BillDetailService;
use Illuminate\Http\Request;

class BillDetailController extends Controller
{
    //
    protected BillDetailService $billdetailSer;
    public function __construct(BillDetailService $billdetailSer)
    {
        $this->billdetailSer = $billdetailSer;
    }


}
