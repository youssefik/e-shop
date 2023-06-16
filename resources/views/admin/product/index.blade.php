@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <h1>All categories</h1>
        <hr>
    </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>category id</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td><img src="{{asset('assets/uploads/products/'.$product->image)}}" alt="" width="250px" height="150px"></td>
                        <td>
                            <a href="{{url('edit-product/'.$product->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{url('delete-product/'.$product->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button href="" class="btn btn-danger btn-sm">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


</div>

@endsection
