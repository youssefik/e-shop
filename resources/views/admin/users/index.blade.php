@extends('layouts.admin')

@section('title','Orders')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">
                            Registred Users

                        </h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name.' '.$item->lname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    <a href="{{url('admin/view-user/'.$item->id)}}" class="btn btn-primary">View</a>
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
