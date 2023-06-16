@extends('layouts.front')

@section('title','Checkout')

@section('content')
<div class="container mt-5">
  <form action="{{url('place-order')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="card-body">
            <h6>Basic Details</h6>
            <hr>
            <div class="row checkout-form">
              <div class="col-md-6">
                <label for="">First Name</label>
                <input value="{{Auth::user()->name}}" type="text" class="form-control firstname" name="fname" placeholder="Enter First Name" id="">
                <span class="text-danger" id="fname_error"></span>
              </div>
              <div class="col-md-6">
                <label for="">Last Name</label>
                <input value="{{Auth::user()->lname}}" type="text" class="form-control lastname" name="lname" placeholder="Enter Last Name" id="">
                <span class="text-danger" id="lname_error"></span>
              </div>
              <div class="col-md-6">
                <label for="">Email</label>
                <input value="{{Auth::user()->email}}" type="text" class="form-control email" name="email" placeholder="Enter Email" id="">
                <span class="text-danger" id="email_error"></span>
              </div>
              <div class="col-md-6 mt-3">
                <label for="">Phone Number</label>
                <input value="{{Auth::user()->phone}}" type="text" class="form-control phone" name="phone" placeholder="Enter Phone Number" id="">
                <span class="text-danger" id="phone_error"></span>
              </div>
              <div class="col-md-6 mt-3">
                <label for="">Adress 1</label>
                <input value="{{Auth::user()->adress1}}" type="text" class="form-control adress1" name="adress1" placeholder="Enter Adress 1" id="">
                <span class="text-danger" id="adress1_error"></span>
              </div>
              <div class="col-md-6 mt-3">
                <label for="">Adress 2</label>
                <input value="{{Auth::user()->adress2}}" type="text" class="form-control adress2" name="adress2" placeholder="Enter Adress 2" id="">
                <span class="text-danger" id="adress2_error"></span>
              </div>
              <div class="col-md-6 mt-3">
                <label for="">City</label>
                <input value="{{Auth::user()->city}}" type="text" class="form-control city" name="city" placeholder="Enter City" id="">
                <span class="text-danger" id="city_error"></span>
              </div>
              <div class="col-md-6 mt-3">
                <label for="">State</label>
                <input value="{{Auth::user()->state}}" type="text" class="form-control state" name="state" placeholder="Enter State" id="">
                <span class="text-danger" id="state_error"></span>
              </div>
              <div class="col-md-6 mt-3">
                <label for="">Country</label>
                <input value="{{Auth::user()->country}}" type="text" class="form-control country" name="country" placeholder="Enter Country" id="">
                <span class="text-danger" id="country_error"></span>
              </div>
              <div class="col-md-6 mt-3">
                <label for="">Pin Code</label>
                <input value="{{Auth::user()->pincode}}" type="text" class="form-control pincode" name="pincode" placeholder="Enter Pin Code" id="">
                <span class="text-danger" id="pincode_error"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            <h6>Order Details</h6>
            <hr>
            @if ($cartItems->count() > 0)
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Qty</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartItems as $item)
                <tr>
                  <td>{{ $item->products->name }}</td>
                  <td>{{ $item->prod_qty }}</td>
                  <td>{{ $item->products->selling_price }}</td>
                  <td></td>
                  <td></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <h6 class="px-2">
              Grand total : <span class="float-end"> {{$total}}</span>
            </h6>
            <hr>
            <input type="hidden" name="payment_mode" value="COD">
            <button class="btn btn-success float-end w-100" type="submit">
              Place order | COD
            </button>
            <div id="paypal-buttons-container"></div>
            @else
            <h4 class="text-center">
              No products in cart
            </h4>
            @endif
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AS-3oIEBz7z59gFlayGZXfLPJ_VxrAAgu1GBLilDeDtG_YdJwTCeMZ6hZmRCtx4Ehe51k0RSh5R0x2XX"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{$total}}'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        var firstname = $('.firstname').val();
        var lastname = $('.lastname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var adress1 = $('.adress1').val();
        var adress2 = $('.adress2').val();
        var city = $('.city').val();
        var state = $('.state').val();
        var country = $('.country').val();
        var pincode = $('.pincode').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var data = {
          fname: firstname,
          lname: lastname,
          email: email,
          phone: phone,
          adress1: adress1,
          adress2: adress2,
          city: city,
          state: state,
          country: country,
          pincode: pincode,
          payment_mode :"paid with paypal",
          payment_id: details.id
        };
        $.ajax({
          method: "POST",
          url: "place-order",
          data: data,
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          success: function (response) {
            window.location.href = 'my-orders';
            swal("",response.status,"success");
            // console.log(response.status);
          }
        });
      });
    }
  }).render('#paypal-buttons-container');
</script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

@endsection
