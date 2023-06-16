@extends('layouts.front')




@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        {{-- <h6 class="mb-0">Collections / {{$product->category->name}} /{{$product->name}}</h6> --}}
        <div class="mb-6">
            <a href="{{url('/')}}">
                Home
            </a>
            <a href="{{url('category/')}}">
                cart
            </a>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow cartitems">
        @if ($cartItems->count() > 0)
        <div class="card-body">
            @php
                $total = 0;
            @endphp
            @foreach ($cartItems as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" alt="" width="70px" height="70px">
                </div>
                <div class="col-md-5">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-3">
                    @if ($item->products->qty > $item->prod_qty)
                    <label for="qty">Quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="qty" value="{{ $item->prod_qty }}" class="form-control qty-input text-center" data-prod_id="{{ $item->prod_id }}">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->products->selling_price * $item->prod_qty ; @endphp
                    @else
                    <h6>Out Of Stock</h6>
                    @endif

                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger delete-cart-item" data-prod_id="{{ $item->prod_id }}">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </div>
            </div>

            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total price : {{$total}}</h6>
            <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceded to Checkout </a>

        </div>
        @else
            <div class="card-body text-center">
                <h2>
                    Your <i class="fa fa-shopping-cart"></i> cart is empty
                </h2>
                <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
            </div>
        @endif

    </div>
</div>

@endsection

