<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Http\Controllers\Controller;
use Session;

class VendorController extends Controller
{
    public function vendorRegister()
    {
        return view('frontend.vendor.auth');
    }
    public function vendorRegistration(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:vendors',
            'phone' => 'required',
            'address' => 'required',
            'logo' => 'required',
            'password' => 'required',

        ]);
        if($request->file('logo')){
            $name = time(). '.' .$request->logo->extension();
            $request->logo->move(public_path('/vendor/'),$name);
        }
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->password = bcrypt($request->password);
        $vendor->logo = $name;
        $vendor->save();
        return redirect()->back()->with('success','Your Registration has been successfully, please wait admin approval');
    }
    public function vendorLogin(Request $request)
    {
        $vendor = Vendor::where('email',$request->email)->first();
        // if($vendor->is_approved == 0){
        //     return redirect()->back()->with('error','You are a not approved  Vendor.');
        // }
        if(!$vendor){
            return redirect()->back()->with('error','You are not valid vendor ,please Register first .');
        }else{
            if(password_verify($request->password,$vendor->password)){
                Session::put('vendorId',$vendor->id);
                Session::put('vendorName',$vendor->name);
                return redirect('/vendor/dashboard');
            }else{
                return redirect()->back()->with('error','Password not match');
            }
        }
    }
    public function vendorDashboard()
    {
        return "Vendor Dashboard";
    }
}

