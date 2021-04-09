<?php


namespace App\Http\Repositories;


use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryRepository
{
    protected $category ;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    function getAll(){
        return $this->category->paginate(3);
    }



    function findById($id){
        return $this->category->findOrFail($id);
    }

    function store($category)
    {
        DB::beginTransaction();
        try {
            $category->save();
//            $product->category()->sync($categories);
            DB::commit();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
//            DB::rollBack();
        }

    }

    function delete($category){
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();
            toastSuccess('Delete Successfully!');
        }catch (\Exception $exception){
            toastError('You can not delete Category','If you want to delete it, you must update the product again');
            DB::rollBack();
        }
    }
}
