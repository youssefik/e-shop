@extends('layouts.front')

@section('title','Welcome To E-Shop')

@section('content')

<div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

        @foreach ($sliders as $key => $slider)
        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">

            @if ($slider->image)
                <img src="{{asset('assets/uploads/slider/'.$slider->image)}}" class="d-block w-100" alt="...">
            @endif
            <div class="carousel-caption d-none d-md-block">
              <h5>{{ $slider->title}}</h5>
              <p>{{$slider->description}}</p>
            </div>
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        {{ $slider->title}}
                    </h1>
                    <p>
                        {{$slider->description}}
                    </p>
                    {{-- <div>
                        <a href="#" class="btn btn-slider">
                            Get Now
                        </a>
                    </div> --}}
                </div>
            </div>

          </div>
        @endforeach

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>Featured products</h1>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($featured_products as $prod)
                <div class="item">
                    <div class="card">
                            <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="Product image" height="200px">
                            <div class="card-body">
                                <h5>
                                    {{$prod->name}}
                                </h5>
                                <span class="float-start">
                                    {{$prod->selling_price}} $
                                </span>
                                <del class="float-end">
                                    {{$prod->original_price}} $
                                </del>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>Trending category</h1>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($trending_category as $tcategory)
                <div class="item">
                    <a href="{{url('view_category/'.$tcategory->slug)}}">
                    <div class="card">
                            <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}" alt="Product image" height="200px">
                            <div class="card-body">
                                <h5>
                                    {{$tcategory->name}}
                                </h5>
                                <p>
                                    {{$tcategory->description}} $
                                </p>
                            </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    </script>

@endsection
