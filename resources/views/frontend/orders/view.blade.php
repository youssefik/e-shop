@extends('layouts.front')

@section('title','My Orders')

@section('content')

        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header bg-primary">
                            <h4 class="text-white">
                                Order View
                                <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">
                                    back
                                </a>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 order-details">
                                    <h4>Shipping Details</h4>
                                    <hr>
                                    <label for="">First Name</label>
                                    <div class="border ">
                                        {{$orders->fname}}
                                    </div>
                                    <label for="">Last Name</label>
                                    <div class="border ">
                                        {{$orders->lname}}
                                    </div>
                                    <label for="">Email</label>
                                    <div class="border ">
                                        {{$orders->email}}
                                    </div>
                                    <label for="">Contatct No.</label>
                                    <div class="border ">
                                        {{$orders->phone}}
                                    </div>
                                    <label for="">Shipping Adress</label>
                                    <div class="border ">
                                        {{$orders->adress1}} <br>
                                        {{$orders->adress2}} <br>
                                        {{$orders->city}} <br>
                                        {{$orders->state}}
                                        {{$orders->country}}
                                    </div>
                                    <label for="">Zip code</label>
                                    <div class="border ">
                                        {{$orders->pincode}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <h4>Order Details</h4>
                                        <hr>
                                        <thead>
                                            <tr>
                                                <th>Tracking Number</th>
                                                <th>Quantity</th>
                                                <th>price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->orderItems as $item)
                                            <tr>
                                                <td>{{$item->product->name}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td>{{$item->product->selling_price}}</td>
                                                <td>
                                                    <img src="{{asset('assets/uploads/products/'.$item->product->image)}}" alt="" srcset="" width="50px">
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                    <h4 class="px-2"> <span class="float-end">Grand Total : {{$orders->total_price}} </span></h4>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

@endsection
