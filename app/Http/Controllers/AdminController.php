<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

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
}
