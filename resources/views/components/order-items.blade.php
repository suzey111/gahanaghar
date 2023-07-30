<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->

    <div class="mt-3">
                    <table class="table">
                        <tr class="text_color">
                            <th>Product Id</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>


@php 

$totalamount=0;

@endphp
                        @foreach($items as $item)
                        <tr >
                            <th>{{ $item->product->id }}</th>
                            <th>{{ $item->product_title }}</th>
                            <th>{{ $item->quantity }}</th>
                            <th>{{ $item->product->category }}</th>
                            <th>{{ $item->price }}</th>
                            <th>{{  $item->price* $item->quantity   }}</th>
                            @php 
          $totalamount=$totalamount+($item->price* $item->quantity);
                            @endphp
                        </tr>
                        @endforeach

                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-right">Total</th>
                                <th>{{$totalamount }}</th>
                            </tr>
                        </tfoot>
                      
                    </table>
                </div>
</div>