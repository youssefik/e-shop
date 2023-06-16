@extends('layouts.front')

@section('title','Welcome To E-Shop')

@section('content')


<div class="py-5">
    <div class="container">
        <div class="row">
                        <div class="col-md-12">
                            <h1>All categories</h1>
                            <div class="row">
                                @foreach ($categories as $category)
                                <div class="col-md-3 mb-3">
                                    <a href="{{url('view_category/'.$category->slug)}}">
                                    <div class="card">
                                        <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="categoryuct image" height="200px">
                                        <div class="card-body">
                                            <h5>
                                                {{$category->name}}
                                            </h5>
                                            <p>{{$category->description}} </p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
        </div>
    </div>
</div>

@endsection
