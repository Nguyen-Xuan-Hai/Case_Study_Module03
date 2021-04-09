<?php


namespace App\Http\Services;


use App\Http\Repositories\BillRepository;

class BillDetailService
{
    protected BillRepository $billdetailRepo;
    public function __construct(BillRepository $billdetailRepo)
    {
        $this->billdetailRepo = $billdetailRepo;
    }



}
