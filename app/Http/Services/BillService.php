<?php


namespace App\Http\Services;


use App\Http\Repositories\BillRepository;

class BillService
{
    protected BillRepository $billRepo;
    public function __construct(BillRepository $billRepo)
    {
        $this->billRepo = $billRepo;
    }

    function getAll(){
        return $this->billRepo->getAll();
    }


    function findById($id){
        return $this->billRepo->findById($id);
    }


    function update($id,$request){

            $bills = $this->billRepo->findById($id);
            $bills->fill($request->all());

            $this->billRepo->store($bills);
    }



}
