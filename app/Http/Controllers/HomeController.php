<?php

namespace App\Http\Controllers;

use App\Mail\MyMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {
        $product=Product::paginate(6);
        
        return view('home.userpage',compact('product'));
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {
            return view('admin.home');
        }
        else 
        {
            $product=Product::paginate(6);
        
            return view('home.userpage',compact('product'));

        }
    }

    public function product_details($id)
    {
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $product=product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->Product_title=$product->title;

            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price=$product->price * $request->quantity;
            }
            
            $cart->image=$product->image;
            $cart->product_id=$product->id;
           
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->where('is_ordered',false)->get();
    
            return view('home.show_cart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
       
    }

    public function checkout()
    {
        if(!auth()->user())
        {
            $itemsincart = 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->count();
        }
       
        return view('myorders');
    }

    public function remove_cart($id)
    {
          $cart=cart::find($id);
          $cart->delete();
          return redirect()->back();
    }


    public function sendMail(Request $request){
        $details =[
            "email" => $request->email,
            "message" => $request->message,
            "title" => "Message from " . $request -> email
        ];
        $admin = User::where('usertype',1)->select('email')->first();

        Mail::to($admin['email'])->send(new MyMailer($details));

        return redirect()->back()->with('message','Message sent successfully');
    }

    public function product_search(Request $request)
    {
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orwhere('category','LIKE',"$search_text")->paginate(6);
        return view('home.userpage',compact('product'));

    }
}
