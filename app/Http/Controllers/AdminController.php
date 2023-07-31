<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new category;
        $data->category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
    public function edit_category($id)
    {
        $data = category::find($id);

        return view('admin.edit_category', compact('data'));
    }
    public function update_category(Request $request)
    {

        category::find($request->id)->update($request->toArray());
        session()->flash('message', 'Category Updated Successfully');
        return redirect('/view_category');
    }
    public function return_back()
    {
        return redirect('/view_category');
    }

    public function view_product()
    {
        $products = Product::all();
        return view('admin.view_product', compact('products'));
    }

    public function add_product_page()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function delete_product($id)
    {
        $product = product::find($id);


        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }


    public function update_product($id)
    {
        $product = product::find($id);
        $category = category::all();
        return view('admin.update_product', compact('product', 'category'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('/product', $imagename);

            $product->image = $imagename;
        }


        $product->save();
        session()->flash('message', 'Product Updated Successfully');
        return redirect('/view_product');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->password = bcrypt($request->password);
        $admin->usertype = 1;
        $admin->save();
    
        session()->flash('message', 'New admin created successfully');
        return redirect()->back();
    }

    public function dashboard()
    {
        //getting total no. of products
        $total_product = Product::all()->count();
        //getting total no. of categories
        $total_categories = Category::all()->count();
        //getting total no. of orders
        $total_order = Order::all()->count();

        //getting all users
        $users = [
            "customers" => User::where('usertype', 0) -> get(),
            "admins" => User::where('usertype', 1) -> get()
        ];

        return view('admin.dashboard',compact('total_product','total_categories','total_order','users'));
    }
}
