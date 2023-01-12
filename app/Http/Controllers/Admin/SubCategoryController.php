<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subcategoryCreate()
    {
        $categories = Category::get();
        return view('backend.admin.subcategory.create',compact('categories'));
    }

    public function subcategoryManage()
    {
         $subcategories = Subcategory::with('category')->paginate(10);
        return view('backend.admin.subcategory.list', compact('subcategories'));
    }

       public function subcategoryEdit($id)
       {
        $categories = Category::get();
        $subcategory = Subcategory::find($id);
        return view('backend.admin.subcategory.edit',compact('subcategory','categories'));
       }

    public function subcategoryStore(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string'
]);

        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ', '-',  strtolower($request->name));
        $subcategory->save();
        return redirect()->back()->with('success','Subcategory has been created');
    }

    public function subcategoryUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string'
]);
    $subcategory = Subcategory::find($id);
       
    {
        $subcategory->id = $request->id;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ', '-', strtolower($request->name));
        $subcategory->save();
        return redirect()->back()->with('success','SubCategory has been updated');

    }
}

    public function subcategoryDelete($id)
    {
        $subcategoryDelete = Subcategory::find($id);
        $subcategoryDelete->delete();
        return redirect('/subcategory/manage')->with('success','Subcategory has been deleted');

    }
}

