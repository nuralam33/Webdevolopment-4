<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $addToCart = new Cart();
        $addToCart->user_id = auth()->user()->id;
        $addToCart->vendor_id = $request->vendor_id;
        $addToCart->product_id = $request->product_id;
        $addToCart->price = $request->price;
        $addToCart->qty = 1;
        $addToCart->total_price = 1*$request->price;
        $addToCart->save();
        return redirect()->back()->withSuccess('Product has been added to cart');
    }
    public function checkOut()
    {
        $Products = Cart::with('product')->where('user_id',auth()->user()->id)->get();
        return view('frontend.checkout.index',compact('Products'));
    }
    public function cartUpdate(Request $request, $id){
        $cartProductUpdate = Cart::find($id);
        $cartProductUpdate->qty = $request->qty;
        $cartProductUpdate->save();
        return redirect()->back()->withSuccess('Cart product has been Updated');
       }
   
       public function cartProductDelete($id)
       {
           $cartProduct= Cart::find($id);
           $cartProduct->delete();
           return redirect()->back()->withSuccess('Cart product has been Deleted');
       }
}
