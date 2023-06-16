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
                        <td>Name</td>
                        <td>Description</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td><img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="" width="250px" height="150px"></td>
                        <td>
                            <a href="{{url('edit-category/'.$category->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{url('delete-category/'.$category->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button href="" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


</div>

@endsection
