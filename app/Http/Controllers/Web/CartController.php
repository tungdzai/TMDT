<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Web\ProductServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    private $productServices;
    public function __construct(ProductServices $productServices)
    {

        $this->productServices = $productServices;
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        // dd($cart);
        return view('web.cart.index', ['cartItems' => $cart]);
    }
    public function add(Request $request, $id)
    {
        $id = (int) $request->id;
        $quantity = (int) $request->quantity;
        $product = $this->productServices->findById($id);
        // dd($request->quantity , $product->quantity);
        if( $request->quantity > $product->quantity ){
            return Redirect::back()->withErrors(['msg' => 'bạn chỉ có thể mua được'."$product->quantity".' sản phẩm']);
        }
        else{
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += $quantity;
            } else {
                $cart[$id] = [
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "price" => $product->price,
                    "image" => $product->image
                ];
            }
            session()->put('cart', $cart);
            // dd($request->all(), $product, $cart);
            return redirect()->route('cart.view');
        }
    }
    public function update(Request $request,$id)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.view');
        }
    }


    public function delete(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->route('cart.view');
        }
    }
}
