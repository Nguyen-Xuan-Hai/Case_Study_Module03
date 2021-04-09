<?php


namespace App\Http\Repositories;


use App\Models\Bill_detail;

class BillDetailRepository
{
    protected Bill_detail $billdetail;
    public function __construct(Bill_detail $billdetail)
    {
        $this->billdetail = $billdetail;
    }

    function getAll(){
        return $this->billdetail->all();
    }

}
