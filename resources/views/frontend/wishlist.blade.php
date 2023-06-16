@extends('layouts.front')

@section('title', 'Wishlist')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <div class="mb-6">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('wishlist') }}">Wishlist</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow wishlistitems">
            @if ($wishlist->count() > 0)
                <div class="card-body">
                    @foreach ($wishlist as $item)
                        <div class="row product_data">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt=""
                                    width="70px" height="70px">
                            </div>
                            <div class="col-md-2">
                                <h6>{{ $item->products->name }}</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>{{ $item->products->selling_price }}</h6>
                            </div>
                            <div class="col-md-2">
                                @if ($item->products->qty > 0)
                                    <label for="qty">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width: 130px">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="qty" value="{{ $item->products->qty }}"
                                            class="form-control qty-input text-center" data-prod_id="{{ $item->prod_id }}">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                @else
                                    <h6>Out Of Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary me-3 addToCartBtn float-start"
                                    data-prod_id="{{ $item->prod_id }}">
                                    <i class="fa fa-shopping-cart"></i> Add to cart
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger delete-wishlist-item" data-prod_id="{{ $item->prod_id }}">
                                    <i class="fa fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer"></div>
            @else
                <h4>There are no products in your Wishlist</h4>
            @endif

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadwishlist() {
                $.ajax({
                    method: "GET",
                    url: "load-wishlist-data",

                    success: function(response) {
                        $('.wishlist-count').html('');
                        $('.wishlist-count').html(response.count);
                        // console.log(response.count)
                    }
                });

            }
            $('.addToCartBtn').click(function(e) {
                e.preventDefault();

                var product_id = $(this).data('prod_id');
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '{{ url('add-to-cart') }}',
                    data: {
                        product_id: product_id,
                        product_qty: product_qty,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        swal(response.status);
                        console.log(response.status);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });

            // $('.delete-wishlist-item').click(function (e) {
            $(document).on('click', '.delete-wishlist-item', function(e) {
                e.preventDefault();

                var prod_id = $(this).data('prod_id');
                var csrf_token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    method: 'POST',
                    url: '{{ url('delete-wishlist-item') }}',
                    data: {
                        'prod_id': prod_id,
                        '_token': csrf_token
                    },
                    success: function(response) {
                        // window.location.reload();
                        loadwishlist()
                        $('.wishlistitems').load(location.href + " .wishlistitems")
                        swal("", response.status, "success");
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endsection
