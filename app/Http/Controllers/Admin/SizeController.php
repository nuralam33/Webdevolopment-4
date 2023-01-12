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
    
}
