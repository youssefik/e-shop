@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-12 grid-margin">



        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Total Orders</label>
                    <h1>{{$totalOrder}}</h1>
                    <a href="{{url('orders')}}" class="text-white"></a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label for="">Today Orders</label>
                    <h1>{{$todayOrder}}</h1>
                    <a href="{{url('orders')}}" class="text-white"></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label for="">This Month Orders</label>
                    <h1>{{$thisMonthOrder}}</h1>
                    <a href="{{url('orders')}}" class="text-white"></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                    <label for="">Year Orders</label>
                    <h1>{{$thisYearOrder}}</h1>
                    <a href="{{url('orders')}}" class="text-white"></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">total Products</label>
                    <h1>{{$totalProducts}}</h1>
                    <a href="{{url('orders')}}" class="text-white"></a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label for="">total Categories</label>
                    <h1>{{$totalCategories}}</h1>
                    <a href="{{url('orders')}}" class="text-white"></a>
                </div>

        </div>
    </div>
</div>

@endsection
