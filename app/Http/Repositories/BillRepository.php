<?php


namespace App\Http\Repositories;


use App\Models\Bill;
use Illuminate\Support\Facades\DB;

class BillRepository
{
    protected Bill $bill;
    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    function getAll(){
        return $this->bill->paginate(3);
    }

    function findById($id){
        return $this->bill->findOrFail($id);
    }

    function store($bills){
        DB::beginTransaction();
        try {
            $bills->save();
//            $product->category()->sync($categories);
            DB::commit();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
//            DB::rollBack();
        }
    }


}
