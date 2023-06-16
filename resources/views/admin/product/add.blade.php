@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <h1>
            Add Products
        </h1>
    <div class="card-body">

        <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select name="cate_id" class="form-select">
                        <option value="">select Category</option>
                        @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                    {{-- <select name="cat_id" class="form-select" id="">
                        <option value="">select Category</option>
                            @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                    </select> --}}

                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="slug" class="form-label">Small description</label>
                    <textarea name="small_description" id="description" cols="30" rows="5" class="form-control" required></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" required></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original price</label>
                    <input type="number" class="form-control" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling price</label>
                    <input type="number" class="form-control" name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" class="form-control" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="qty">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">status</label>
                    <input type="checkbox" name="status">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">trending</label>
                    <input type="checkbox" name="trending">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" id="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>


    </div>
</div>

@endsection
