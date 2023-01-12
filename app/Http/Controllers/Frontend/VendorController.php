<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function vendorRegister()
    {
        return view('frontend.vendor.auth');
    }
    public function vendorRegistration(Request $request)
    {
        // $this->validate($request,[
        //     'name' => 'required|string',
        //     'image' => 'required',
        // ]);

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
        return redirect()->back()->with('success','Your Registration has been successfully,please wait admin approval');
     }
}
