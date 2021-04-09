<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    function index(){
        $categories = $this->categoryService->getAll();
        return view('backend.admin.categories.list',compact('categories'));
    }



    function create(){

        return view('backend.admin.categories.add');
    }

    function store(Request $request){
//        dd($request);
        $this->categoryService->store($request);
        toastSuccess('Create Successfully!');

        return redirect()->route('categories.index');
    }

    function delete($id){
        $category = $this->categoryService->findById($id);
        $this->categoryService->delete($category);
        return redirect()->route('categories.index');
    }

}
