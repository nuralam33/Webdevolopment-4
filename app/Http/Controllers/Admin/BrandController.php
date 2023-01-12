<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function brandCreate()
    {
        $categories = Category::get();
        return view('backend.admin.brand.create', compact('categories'));
    }

    public function brandManage()
    {
        $brands = brand::with('category')->paginate(10);
        return view('backend.admin.brand.list', compact('brands'));
    }

    public function brandEdit($id)
    {   
        $categories = Category::get();
        $brands = Brand::find($id);
        return view('backend.admin.brand.edit', compact('brands','categories'));
    }

    public function brandStore(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string'
        ]);

        $brand = new Brand();
        $brand->category_id = $request->category_id;
        $brand->name = $request->name;
        $brand->slug = str_replace(' ', '-',  strtolower($request->name));
        $brand->save();
        return redirect()->back()->with('success', 'Brand has been created');
    }

    public function brandUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string'
        ]);
        $brand = brand::find($id); {
            $brand->id = $request->id;
            $brand->name = $request->name;
            $brand->slug = str_replace(' ', '-', strtolower($request->name));
            $brand->save();
            return redirect()->back()->with('success', 'Brand has been updated');
        }
    }

    public function brandDelete($id)
    {
        $brandDelete = brand::find($id);
        $brandDelete->delete();
        return redirect('/brand/manage')->with('success', 'brand has been deleted');
    }
}
