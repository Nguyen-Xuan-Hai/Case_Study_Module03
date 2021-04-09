<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\False_;

class ProductFrontendController extends Controller
{
//    const BILL_PENDING = 1;
    //
    function view(){
        $products = Product::paginate(4);
//        dd($products);
        return view('frontend.products.index',compact('products'));
    }

    function showMenu(){
        $products = Product::all();
        return view('frontend.products.list',compact('products'));
    }



    function addToCart($id): \Illuminate\Http\RedirectResponse
    {

        $product = Product::findOrFail($id);
        $oldCart = session()->get('cart');
//        dd($oldCart);
        $newCart = new Cart($oldCart);
//        dd($newCart);
        $newCart->addProduct($product);
        session()->put('cart', $newCart);
        toastSuccess('Add your product success');
        return back();
    }

    function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

            $cart = session()->get('cart');
            if ($cart == null){
                toastWarning('Please add your product before in cart');
                return view('frontend.home');

            }
        return view('frontend.carts.index', compact('cart'));


    }

    function removeProduct($id): \Illuminate\Http\RedirectResponse
    {
        $oldCart = session()->get('cart');
        $newCart = new Cart($oldCart);
        $newCart->deleteProduct($id);
        session()->put('cart', $newCart);
        toastSuccess('You are delete success');
        return back();
    }

    function updateCart(Request $request): \Illuminate\Http\RedirectResponse
    {

        foreach ($request->quantity_product as $key => $value) {
            $oldCart = session()->get('cart');
            $newCart = new Cart($oldCart);
            $newCart->updateCart($key, $value);
            session()->put('cart', $newCart);
        }
        toastSuccess('You are update success');
        return back();
    }

    function deleteCart(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        session()->forget('cart');
        toastSuccess('All product delete success');
        return redirect('/');
    }

    function showFormCheckOut(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
//        $customers = Auth::guard('users')->login(user: false);
            $cart = session()->get('cart');
            return view('frontend.carts.checkout', compact('cart'));
    }


    function checkOut(Request $request) {
        $cart = session()->get('cart');

        DB::beginTransaction();

        try {
            $customer = new Customer();
            $customer->fill($request->all());
            $customer->save();

            $bill = new Bill();
            $bill->customer_id = $customer->id;
            $bill->datepay = date('Y-m-d');
            $bill->status = "InProcess";
//            $bill->total_money = $cart->totalPrice;
            $bill->save();

            foreach ($cart->items as $key => $item) {
                $billDetail = new Bill_detail();
                $billDetail->product_id = $key;
                $billDetail->bill_id = $bill->id;
                $billDetail->totalQty = $item['totalQty'];
                $billDetail->totalPrice = $item['totalPrice'];
                $billDetail->save();
            }

            DB::commit();
            session()->forget('cart');
            toastSuccess('CheckOut success');
            return redirect('/');
        }catch (\Exception $exception){
            toastWarning('Please check the information');
            DB::rollBack();
        }

    }
//
//    function updateProduct(Request $request) {
//        $idProduct = $request->idProduct;
//
//        return response()->json(1);
//    }
}
