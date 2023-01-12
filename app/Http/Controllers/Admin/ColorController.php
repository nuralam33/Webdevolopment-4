<?php

namespace App\Http\Controllers\Admin;

use App\Models\color;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function colorCreate()
    {
        $categories = Category::get();
        return view('backend.admin.color.create', compact('categories'));
    }

    public function colorStore(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string'

        ]);

        $color = new Color();
        $color->name = $request->name;
        $color->category_id = $request->category_id;
        $color->status = $request->status;
        $color->save();
        return redirect()->back()->with('success', 'Category has been created');
    }
    public function colorManage()
    {
        $colors = Color::paginate(5);
        return view('backend.admin.color.list', compact('colors'));
    }
    public function colorEdit($id)
    {
        $categories = Category::get();
        $colors = color::find($id);
        return view('backend.admin.color.edit', compact('colors', 'categories'));
    }
    public function colorUpdate(Request $request, $id)
    {
       
        $color = Color::find($id);
        $color->name = $request->name;
        $color->status = $request->status;
        $color->save();
        return redirect('/color/manage')->with('success');
    }
    public function colorDelete($id)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect('/color/manage')->with('success');
    }
}
