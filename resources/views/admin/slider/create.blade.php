@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Add Slider</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('sliders/create_slider') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="description" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="image" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" name="status" class="form-control" id="status">
                Checked-Hidden, Unchecked-Visible
            </div>
            <button type="submit">Add</button>
        </form>
    </div>
</div>
@endsection
