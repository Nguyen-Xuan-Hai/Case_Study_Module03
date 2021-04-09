<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use voku\helper\ASCII;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    function index(){
        $products = $this->productService->getAll();
        return view('backend.admin.products.list',compact('products'));
    }



    function create(){
        $categories = Category::all();
        return view('backend.admin.products.add',compact('categories'));
    }

    function store(Request $request){
//        dd($request);
        $this->productService->store($request);
        toastSuccess('Create Successfully!');

        return redirect()->route('products.index');
    }

    function delete($id){
        $product = $this->productService->findById($id);
        $this->productService->delete($product);
        toastSuccess('Delete Successfully!');

        return redirect()->route('products.index');
    }

    function edit($id){
        $product = $this->productService->findById($id);
        $categories = Category::all();
        return view('backend.admin.products.edit',compact('product','categories'));
    }

    function update($id,Request $request){
//        dd($request,$id);
        $this->productService->update($id,$request);
        toastSuccess('Update Successfully!');

        return redirect()->route('products.index');
    }
}
