@extends('layouts.admin')

@section('title','Orders')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">
                            Order View
                            <a href="{{url('orders-history')}}" class="btn btn-warning text-white float-right">
                                Orders History
                            </a>
                        </h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{date('d-m-y',strtotime($item->created_at))}}</td>
                                <td>{{$item->tracking_no}}</td>
                                <td>{{$item->total_price}}</td>
                                <td>{{$item->status == '0' ? 'pending' : 'completed'}}</td>
                                <td>
                                    <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
