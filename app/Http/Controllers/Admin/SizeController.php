<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SizeController extends Controller
{
    public function sizeCreate()
    {
        $categories = Category::get();
        return view('backend.admin.size.create', compact('categories'));
    }

    public function sizeStore(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string'


        ]);

        $size = new Size();
        $size->name = $request->name;
        $size->category_id = $request->category_id;
        $size->status = $request->status;
        $size->save();
        return redirect()->back()->with('success', ' Size  has been Added');
    }

    public function sizeManage()
    {
        $sizes = Size::paginate(5);
        return view('backend.admin.size.list', compact('sizes'));
    }
    public function sizeEdit($id)
    {
        
        $size = Size::find($id);
        
        return view('backend.admin.size.edit',compact('size'));
    }
    public function sizeUpdate(Request $request,$id)
    {
        $size = Size::find($id);
        $size->category_id = $request->category_id;
        $size->name = $request->name;
        $size->status = $request->status;
        $size->save();
        return redirect()->back()->withSuccess('Size has been updated');
    }
    public function sizeDelete($id)
    {
        $sizes = Size::find($id);
        $sizes->delete();
        return redirect()->back()->withSuccess('Size has been Deleted');
    }
}
