@extends('layouts.front')

@section('title', $product->name)

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $product->name }}</h5>
                        <button type="button" class="btn-clode" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star checked"></label>
                                    @endfor
                                    @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                        <input type="radio" value="{{ $j }}" name="product_rating"
                                            id="rating{{ $j }}">
                                        <label for="rating{{ $j }}" class="fa fa-star checked"></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections / {{ $product->category->name }} /{{ $product->name }}</h6>
        </div>
    </div>
    <div class="container pb-5">
        <div class="product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $product->image) }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            <h2 class="mb-0">
                                {{ $product->name }}
                                <label for="" style="font-size: 16px"
                                    class="float-end badge bg-danger trending_tag">{{ $product->trending == '1' ? 'Trending' : '' }}</label>
                            </h2>
                        </h2>

                        <hr>
                        <label for="" class="me-3"><del>Original price :R {{ $product->original_price }}
                                $</del></label>
                        <label for="" class="fw-bold">Selling price :R {{ $product->selling_price }} $</label><br>


                        {{-- @php $ratenum = {{}} @endphp --}}
                        <div class="rating">
                            @for ($i = 1; $i <= $rating_value; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $rating_value + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if ($rating->count() > 0)
                                    {{ $rating->count() }} Ratings
                                @else
                                    No Ratings
                                @endif
                            </span>
                        </div>

                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>

                        @if ($product->qty > 0)
                            <label for="" class="badge bg-success">in stock</label>
                        @else
                            <label for="" class="badge bg-danger">out stock</label>
                        @endif

                        <div class="row mt-2">
                            <div class="col-md-2">

                                <input type="hidden" value="{{ $product->id }}" class="prod_id" name="">
                                <label for="Quantinty">Quantinty</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="Quantity" value="1"
                                        class="form-control qty-input text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                @if ($product->qty > 0)
                                    <button class="btn btn-primary me-3 addToCartBtn float-start">Add to cart</button>
                                @endif
                                <button class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <p class="mt-3">
                        {!! $product->description !!}
                    </p>




                </div>
                <hr>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate this prodcut
                    </button>
                    <a href="{{ url('add-review/' . $product->slug . '/userreview') }}" type="button"
                        class="btn btn-link">
                        Write a review
                    </a>
                </div>

                <div class="col-md-8">
                    @foreach ($reviews as $item)
                        <div class="user_review">
                            <label for="">{{ $item->user->name . '' . $item->user->lname }}</label>
                            @if ($item->user_id == Auth::id())
                                <a href="{{ url('edit-review/' . $product->slug . '/userreview') }}">Edit</a>
                            @endif
                            <br>
                            @php
                                $rating = App\Models\Rating::where('prod_id', $product->id)
                                    ->where('user_id', $item->user->id)
                                    ->first();
                            @endphp
                            @if ($rating)
                                @php
                                    $user_rated = $rating->stars_rated;
                                @endphp
                                @for ($i = 1; $i <= $user_rated; $i++)
                                    <i class="fa fa-star checked"></i>
                                @endfor
                                @for ($j = $user_rated + 1; $j <= 5; $j++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>
                            <p>
                                {{ $item->user_review }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

@endsection


@section('scripts')

    {{-- <script>
        $(document).ready(function(){
            $('.increment-btn').click(function (e) {
                e.preventDefault();

                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value,10);
                value = isNaN(value) ? 0 : value;
                if(value < 10){
                    value++;
                    $('.qty-input').val(value);
                }
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('.addToCartBtn').click(function(e) {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({
                    url: '{{ url('add-to-cart') }}',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        product_qty: product_qty,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        swal(response.status);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });



            });

            $('.addToWishlist').click(function(e) {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({
                    url: '{{ url('add-to-wishlist') }}',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        product_qty: product_qty,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        swal(response.status);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });



            });



            //     $('.increment-btn').click(function (e) {
            //         e.preventDefault();

            //         var inc_value = $('input[name="Quantity"]').val();
            //         var value = parseInt(inc_value,10);
            //         value = isNaN(value) ? 0 : value;
            //         if(value < 10){
            //             value++;
            //             $('input[name="Quantity"]').val(value);
            //         }
            //     });
            //     $('.decrement-btn').click(function (e) {
            //         e.preventDefault();

            //         var dec_value = $('input[name="Quantity"]').val();
            //         var value = parseInt(dec_value,0);
            //         value = isNaN(value) ? 0 : value;
            //         if(value > 0){
            //             value--;
            //             $('input[name="Quantity"]').val(value);
            //         }
            //     });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection





{{-- @extends('layouts.front')

@section('title', 'Edit your Review')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>You are writing a review for {{ $review->product->name }} </h5>
                        <form action="{{ url('/update-review') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Update Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


{{-- reviews>index --}}
{{-- @extends('layouts.front')
@section('title', 'Write a Review')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($verified_purshase->count() > 0)
                            <h5>You are writing a review for {{ $product->name }}</h5>
                            <form action="{{ url('/add-review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h5>You are not eligible to review this product</h5>
                                <p>
                                    For trust worthiness of the reviews, only costumers who purshased the product can write
                                    a review
                                </p>
                                <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go to home page</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection --}}
