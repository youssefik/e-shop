@extends('layouts.front')

@section('title','Welcome To E-Shop')

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"><a href="{{asset('/')}}"{{$category->name}}>Collections</a> / {{$category->name}}</h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>{{$category->name}}</h1>
                @foreach ($products as $prod)
                <div class="col-md-3 mb-3">
                    <a href="{{url('category/'.$category->slug.'/'.$prod->slug)}}">
                    <div class="card">
                            <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="Product image" height="200px">
                            <div class="card-body">
                                <h5>
                                    {{$prod->name}}
                                </h5>
                                <span class="float-start">
                                    {{$prod->selling_price}} $
                                </span>
                                <del class="float-end">
                                    {{$prod->original_price}} $
                                </del>
                            </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
    </div>
</div>

@endsection
