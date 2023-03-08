<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
// use Session;

class FrontendController extends Controller
{
    public function index()
    {
        $new_products = Product::with('category','color','size')->where('type','new')->where('status', 1)->get();
        $hot_products = Product::with('category','color','size')->where('type','hot')->where('status', 1)->get();
        $discount_products = Product::with('category','color','size')->where('type','discount')->where('status', 1)->get();
        return view('frontend.home.index',compact('new_products','hot_products','discount_products'));
    }
    public function userRegister()
    {
        return view('frontend.user.auth');
    }
    // public function userRegistration(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required|string',
    //         'email' => 'required|email|unique:users',
    //         'phone' => 'required',
    //         'address' => 'required',
    //         'password' => 'required',

    //     ]);
    //     $customer = new User();
    //     $customer->name = $request->name;
    //     $customer->phone = $request->phone;
    //     $customer->email = $request->email;
    //     $customer->address = $request->address;
    //     $customer->password = bcrypt($request->password);
    //     $customer->save();
    //     return redirect()->back()->with('success', 'Your Registration has been successfully, please wait for approval');
    // }

    // public function userLogin()
    // {
    //     return view('frontend.user.auth');
    // }
    // public function customerUserLogin(Request $request)
    // {
    //     $customer = User::where('email',$request->email)->first();

    //     if(!$customer){
    //         return redirect()->back()->withError('you are not valid user');
    //     }else{
    //         if(password_verify($request->password,$customer->password)){
    //             session::put('userId',$customer->id);
    //             session::put('userName',$customer->name);
    //             return redirect('/')->withSuccess('User Login Successfully');
    //         }else{
    //             return redirect()->back()->withError('Password not match');
    //         }
    //     }
    // }
}
