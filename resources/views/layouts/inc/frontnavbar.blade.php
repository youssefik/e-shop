<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">E-shop</a>
        <div class="search-bar">
            <form action="{{url('searchproduct')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control" id="search_product" name="product_name" required placeholder="Search products"
                        aria-describedby="basic-addon1">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </form>

        </div>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/category') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cart') }}">cart
                        <span class="badge badge-pill bg-primary cart-count"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/my-orders') }}">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('wishlist') }}">
                        wishlist
                        <span class="badge badge-pill bg-success wishlist-count"></span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
