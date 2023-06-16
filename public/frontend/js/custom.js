$(document).ready(function(){
    loadcart();
    loadwishlist();
    function loadcart(){
        $.ajax({
            method: "GET",
            url: "load-cart-data",

            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
                    // console.log(response.count)
            }
        });

    }

    function loadwishlist(){
        $.ajax({
            method: "GET",
            url: "load-wishlist-data",

            success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
                    // console.log(response.count)
            }
        });

    }

    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: '{{url("add-to-cart")}}',
            type: 'POST',
            data: {
                product_id: product_id,
                product_qty: product_qty,
                _token: '{{ csrf_token() }}'
            },
            success:function(response){
                swal(response.status);
            },
            error:function(err){
                console.log(err);
            }
        });



    });

    $('.addToWishlist').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: '{{url("add-to-wishlist")}}',
            type: 'POST',
            data: {
                product_id: product_id,
                product_qty: product_qty,
                _token: '{{ csrf_token() }}'
            },
            success:function(response){
                swal(response.status);
            },
            error:function(err){
                console.log(err);
            }
        });



    });




    // $('.addToCartBtn').click(function (e) {
    //     e.preventDefault();

    //     var product_id = $(this).closest('.product_data').find('.prod_id').val();
    //     var product_qty = $(this).closest('.product_data').find('.qty-input').val();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });


    //     $.ajax({
    //         url: '{{url("add-to-cart")}}',
    //         type: 'POST',
    //         data: {
    //             product_id: product_id,
    //             product_qty: product_qty,
    //             _token: '{{ csrf_token() }}'
    //         },
    //         success:function(response){
    //             swal(response.status);
    //         },
    //         error:function(err){
    //             console.log(err);
    //         }
    //     });

    // });


    // $('.addToWishlist').click(function (e) {
    //     e.preventDefault();

    //     var product_id = $(this).closest('.product_data').find('.prod_id').val();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });


    //     $.ajax({
    //         method: 'POST',
    //         url: '{{url("add-to-wishlist")}}',
    //         data: {
    //             product_id: product_id,
    //             _token: '{{ csrf_token() }}'
    //         },
    //         success:function(response){
    //             swal(response.status);
    //         },
    //         error:function(err){
    //             console.log(err);
    //         }
    //     });

    // });


    // $('.increment-btn').click(function (e) {
    //     e.preventDefault();

    //     var inc_value = $('input[name="Quantity"]').val();
    //     var value = parseInt(inc_value,10);
    //     value = isNaN(value) ? 0 : value;
    //     if(value < 10){
    //         value++;
    //         $('input[name="Quantity"]').val(value);
    //     }
    // });
    // $('.decrement-btn').click(function (e) {
    //     e.preventDefault();

    //     var dec_value = $('input[name="Quantity"]').val();
    //     var value = parseInt(dec_value,0);
    //     value = isNaN(value) ? 0 : value;
    //     if(value > 0){
    //         value--;
    //         $('input[name="Quantity"]').val(value);
    //     }
    // // });
    // $('.increment-btn').click(function (e) {
    //     e.preventDefault();

    //     var inc_value = $(this).closest('.input-group').find('input[name="Quantity"]').val();
    //     var value = parseInt(inc_value,10);
    //     value = isNaN(value) ? 0 : value;
    //     if(value < 10){
    //         value++;
    //         $(this).closest('.input-group').find('input[name="Quantity"]').val(value);
    //     }
    // });

    // $('.decrement-btn').click(function (e) {
    //     e.preventDefault();

    //     var dec_value = $(this).closest('.input-group').find('input[name="Quantity"]').val();
    //     var value = parseInt(dec_value,0);
    //     value = isNaN(value) ? 0 : value;
    //     if(value > 0){
    //         value--;
    //         $(this).closest('.input-group').find('.qty-input').val(value);
    //     }
    // });


    $(document).on('click', '.increment-btn', function(e) {

    // $('.increment-btn').click(function (e) {
        e.preventDefault();

        var inc_value = $(this).closest('.input-group').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if(value < 10){
            value++;
            $(this).closest('.input-group').find('.qty-input').val(value);
        }
    });


    $(document).on('click', '.decrement-btn', function(e) {

    // $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var dec_value = $(this).closest('.input-group').find('.qty-input').val();
        var value = parseInt(dec_value,0);
        value = isNaN(value) ? 0 : value;
        if(value > 0){
            value--;
            $(this).closest('.input-group').find('.qty-input').val(value);
        }
    });
    // $('.card-body').on('click', '.increment-btn', function (e) {
    //     e.preventDefault();
    //     var prod_id = $(this).data('prod_id');
    //     var qtyInput = $(this).closest('.input-group').find('.qty-input');
    //     var newQty = parseInt(qtyInput.val()) + 1;
    //     qtyInput.val(newQty);
    //     updateCart(prod_id, newQty);
    // });

    // $('.card-body').on('click', '.decrement-btn', function (e) {
    //     e.preventDefault();
    //     var prod_id = $(this).data('prod_id');
    //     var qtyInput = $(this).closest('.input-group').find('.qty-input');
    //     var newQty = parseInt(qtyInput.val()) - 1;
    //     if (newQty < 1) {
    //         newQty = 1;
    //     }
    //     qtyInput.val(newQty);
    //     updateCart(prod_id, newQty);
    // });


    // $('.delete-cart-item').click(function (e) {
    //     e.preventDefault();

    //     var product_id = $(this).closest('.product_data').find('.prod_id').val();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         url: '/delete-cart-item',
    //         type: 'POST',
    //         data: {
    //             product_id: product_id,
    //             _token: '{{ csrf_token() }}'
    //         },
    //         success:function(response){
    //             swal("",response.status,"success");
    //         },
    //         error:function(err){
    //             console.log(err);
    //         }
    //     });
    // });

        // $('.delete-cart-item').click(function (e) {
        $(document).on('click','.delete-cart-item' , function (e) {

        e.preventDefault();

        var prod_id = $(this).data('prod_id');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');


        $.ajax({
            url: '/delete-cart-item',
            type: 'POST',
            data: {
                'prod_id': prod_id,
                '_token': csrf_token
            },
            success:function(response){
                // window.location.reload();
                loadcart();

                $('.cartitems').load(location.href + " .cartitems")
                swal("",response.status,"success");
            },

            error:function(err){
                console.log(err);
            }
        });
        });



    $(document).on('click', '.changeQuantity', function(e) {
    // $('.changeQuantity').click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.qty-input').data('prod_id');
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        data = {
            'prod_id' : prod_id,
            'prod_qty':qty,
            '_token': csrf_token

        },
        $.ajax({
            type: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                // window.location.reload()
                $('.cartitems').load(location.href + " .cartitems")
            }

        });


    });


});
