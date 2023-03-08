@extends('frontend.master')

@section('content')
    <!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="cart-items">
				<div class="container">
					 <h2 class="text-center">My Shopping Bag</h2>
					 <div class="cart-header">

                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                            @php
                                $sum=0;
                                $qty=0;
                            @endphp
                            @foreach ($Products as $row )
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $row->name}}</td>
                                <td>{{ $row ->price }}</td>
                                <td>
                                    <form action="{{url('/cart/product/update/'.$row->id) }}" method="post">
                                     @csrf
                                       <input type="number" name="qty" value="{{ $totalqty=$row->qty }}"/>
        
                                       <button type="submit" class="btn btn-primary btn-sm">submit</button>
                                    </form>
                                </td>
                                <td> {{ $totalPrice = $row->price * $row->qty }}</td>
                                <td>
                                    <a href="{{ url('/cartProduct/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @php
                                $sum+=$totalPrice;
                                $qty+=$totalqty;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="4" style="text-align:right">Grand Total Price</td>
                                <td colspan="1">{{ $sum }}</td>
                                <td colspan="1"></td>
                            </tr>
                         </table>
					 </div>
				</div>
			</div>
	<!-- checkout -->	
@endsection

