@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <h1>
            edit categories
        </h1>
    <div class="card-body">

        <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{$category->name}}" type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input value="{{$category->slug}}" type="text" name="slug" class="form-control" id="slug" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" required>{{$category->description}}</textarea>
                </div>
                @if($category->status == '0')
                <div class="col-md-6 mb-3">
                    <label for="">status</label>
                    <input type="checkbox" name="status">
                </div>
                @elseif($category->status == '1')
                <div class="col-md-6 mb-3">
                    <label for="">status</label>
                    <input type="checkbox" name="status" checked>
                </div>
                @endif


                @if($category->popular == '0')
                <div class="col-md-12 mb-3">
                    <label for="">popular</label>
                    <input type="checkbox" name="popular">
                </div>
                @elseif($category->popular == '1')
                <div class="col-md-12 mb-3">
                    <label for="">popular</label>
                    <input type="checkbox" name="popular" checked>
                </div>
                @endif

                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input value="{{$category->meta_title}}" type="text" name="meta_title" class="form-control" id="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" cols="30" rows="5" class="form-control">{{$category->meta_keywords}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" cols="30" rows="5" class="form-control">{{$category->meta_description}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input value="{{$category->name}}" type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
