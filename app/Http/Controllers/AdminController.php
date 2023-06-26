<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
       $data=new category;
       $data->category_name=$request->category;

       $data->save();
       return redirect()->back()->with('message','Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }
    public function edit_category($id)
    {
        $data=category::find($id);
        
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request)
    {
        
        category::find($request->id)->update($request->toArray());
        session()->flash('message','Category Updated Successfully');
       return redirect('/view_category');
    }
    public function return_back()
    {
        return redirect('/view_category');
    }

    public function view_product()
    {
        $category=category::all();
        return view('admin.view_product',compact('category'));
    }
    public function add_product_page()
    {
        $category=category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)
    {
        $product=new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        $product->save();

        return redirect()->back()->with('message','Product Added Successfully');

    }


}
