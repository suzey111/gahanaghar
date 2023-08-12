<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


public function myorders(){
    $orders=Order::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();

    // dd($orders);
    return view('home.myorders',compact('orders'));
}

    public function store(Request $request)
    {

        // dd($request->all());

        $data = $request->validate([
            'shipping_address' => 'required',
            'phone' => ['required','string','regex:/^9\d{9}$/']
        ]);
        $data['amount']=$request->amount;

        $data['person_name'] = auth()->user()->name;
        $data['user_id'] = auth()->user()->id;
        $data['order_date'] = date('Y-m-d');
        $data['status'] = 'Pending';
        $carts = Cart::where('user_id', auth()->user()->id)->where('is_ordered',false)->get();
      
        $ids = $carts->pluck('id')->toArray();
        $data['cart_id'] = implode(',', $ids);

        // dd($data);
        Order::create($data);
        Cart::whereIn('id', $ids)->update(['is_ordered' => true]);
        
        //mail when order is placed
        // $data = [
        //     'name' => auth()->user()->name,
        //     'mailmessage' => 'New Order has been placed',
    	// 		];
 		// Mail::send('email.email',$data, function ($message){
 		// 	$message->to(auth()->user()->email)
 		// 	->subject('New Order Placed');
 		// });


        return redirect()->route('myorders')->with('success', 'Order has been placed successfully');
        
    }

    public function index()
    {
        $orders=Order::orderBy('created_at','desc')->get();

        return view('admin.view_orders', compact('orders'));
    }


    public function details($orderid)
    {
        $order = Order::find($orderid);

        $items = Cart::whereIn('id', explode(',', $order->cart_id))->get();

       
       
        return view('admin.view_order_items', compact('items','order','orderid'));
    }

    public function showorderitems($orderid)
    {
        $order = Order::find($orderid);

        $items = Cart::whereIn('id', explode(',', $order->cart_id))->get();

       
       
        return view('home.view_order_items', compact('items','order','orderid'));
    }


    public function status($id,$status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        return redirect(route('order.index'))->with('success','Status changed to '.$status);
    }
}