<?php


namespace App\Http\Services;


use App\Http\Repositories\CategoryRepository;
use App\Models\Category;

class CategoryService
{
    protected CategoryRepository $categoryRepo;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    function getAll(){
        return $this->categoryRepo->getAll();
    }

    function findById($id){
        return $this->categoryRepo->findById($id);
    }

    function store($request){
        $category= new Category();
        $category->fill($request->all());

        $this->categoryRepo->store($category);
    }

    function delete($category){
        return $this->categoryRepo->delete($category);
    }

}
