@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>All categories</h1>
            <a href="{{ url('sliders/create') }}">Create</a>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>title</td>
                        <td>Description</td>
                        <td>Image</td>
                        <td>status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{asset('assets/uploads/slider/'.$item->image)}}" alt="" width="70px" height="70px">
                            </td>
                            <td>{{ $item->status == '0' ? 'Visible' : 'Hidden'}}</td>
                            <td>
                                <a href="{{url('sliders/'.$item->id.'/edit')}}" class="btn btn-success">edit</a>

                                <form method="POST" action="{{url('sliders/'.$item->id.'/delete')}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
