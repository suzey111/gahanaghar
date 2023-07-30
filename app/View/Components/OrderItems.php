<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\Order;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderItems extends Component
{
    /**
     * Create a new component instance.
     */

     public $orderid,$items,$order;
    public function __construct($orderid)
    {
        //

        $this->order = Order::find($orderid);

        $this->items = Cart::whereIn('id', explode(',', $this->order->cart_id))->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order-items');
    }
}
