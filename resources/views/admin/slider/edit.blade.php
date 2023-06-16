@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Edit Slider</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('sliders/update_slider/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" required value={{$slider->title}}>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="description" required value={{$slider->description}}>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="image">
                <img src="{{asset('assets/uploads/slider/'.$slider->image)}}" alt="" width="70px" height="70px">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" name="status" class="form-control" id="status" {{$slider->status == '1'? 'checked':''}} >
                Checked-Hidden, Unchecked-Visible
            </div>
            <button type="submit">edit</button>
        </form>
    </div>
</div>
@endsection
