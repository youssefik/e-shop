<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Creative Tim
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{Request::is('dashboard') ? 'active':''}} ">
          <a class="nav-link" href="{{url('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('categories') ? 'active':''}} ">
          <a class="nav-link" href="{{url('categories')}}">
            <i class="material-icons">person</i>
            <p>Categories</p>
          </a>
        </li>
            <li class="nav-item {{Request::is('add-categorie') ? 'active':''}} ">
            <a class="nav-link" href="{{url('add-categorie')}}">
              <i class="material-icons">person</i>
              <p>Add categories</p>
            </a>
          </li>

          <li class="nav-item {{Request::is('products') ? 'active':''}} ">
            <a class="nav-link" href="{{url('products')}}">
              <i class="material-icons">person</i>
              <p>products</p>
            </a>
          </li>
              <li class="nav-item {{Request::is('add-product') ? 'active':''}} ">
              <a class="nav-link" href="{{url('add-product')}}">
                <i class="material-icons">person</i>
                <p>Add products</p>
              </a>
            </li>
        <li class="nav-item {{Request::is('orders') ? 'active':''}}">
            <a class="nav-link" href="{{url('orders')}}">
            <i class="material-icons">person</i>
            <p>Orders</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('users') ? 'active':''}}">
            <a class="nav-link" href="{{url('users')}}">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          <a class="nav-link" href="{{url('sliders')}}">
            <i class="material-icons">person</i>
            <p>Slider</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
