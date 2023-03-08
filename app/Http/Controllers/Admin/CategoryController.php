<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function categoryCreate()
    {
        return view('backend.admin.category.create');
    }

    public function categoryManage()
    {
        $categories = Category::get();
        return view('backend.admin.category.list',compact('categories'));
    }

    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return view('backend.admin.category.edit',compact('category'));
    }

    public function categoryStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'image' => 'required',
        ]);

        if($request->file('image')){
            $name = time(). '.' .$request->image->extension();
            $request->image->move(public_path('/category/'),$name);
        }


        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_replace(' ', '-', strtolower($request->name));
        $category->image = $name;
        $category->save();
        return redirect()->back()->with('success','Category has been created');
    }

     public function categoryUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $category = Category::find($id);
        if(isset($request->image)){
            if($category->image && file_exists('category/'.$category->image)){
                unlink('category/'.$category->image);
            }
            $updateImage = time(). '.' .$request->image->extension();
            $request->image->move(public_path('/category/'),$updateImage);
            $category->image =$updateImage;
        }
        $category->name = $request->name;
        $category->slug = str_replace(' ', '-', strtolower($request->name));
        $category->save();
        return redirect()->back()->with('success','Category has been updated');
    }

    public function categoryDelete($id)
    {
       $category = Category::find($id);
       $category->delete();    
    //    $category->size()->delete();
       return redirect('/category/manage')->with('success','Category has been Deleted');
    }
}
