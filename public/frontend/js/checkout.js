// $(document).ready(function () {
//     $('.razorpay_btn').click(function (e) {
//         e.preventDefault();

//         var firstname = $('.firstname').val();
//         var lastname = $('.lastname').val();
//         var email = $('.email').val();
//         var phone = $('.phone').val();
//         var adress1 = $('.adress1').val();
//         var adress2 = $('.adress2').val();
//         var city = $('.city').val();
//         var state = $('.state').val();
//         var country = $('.country').val();
//         var pincode = $('.pincode').val();

//         if(!firstname){
//             fname_error = "First Name is required";
//             $('#fname_error').html('');
//             $('#fname_error').html(fname_error);
//         }else{
//             email_error = "";
//             $('#fname_error').html('');
//         }

//         if(!lastname){
//             lname_error = "last Name is required";
//             $('#lname_error').html('');
//             $('#lname_error').html(lname_error);
//         }else{
//             email_error = "";
//             $('#lname_error').html('');
//         }

//         if(!email){
//             email_error = "email is required";
//             $('#email_error').html('');
//             $('#email_error').html(email_error);
//         }else{
//             email_error = "";
//             $('#email_error').html('');
//         }

//         if(!phone){
//             phone_error = "phone is required";
//             $('#phone_error').html('');
//             $('#phone_error').html(phone_error);
//         }else{
//             email_error = "";
//             $('#phone_error').html('');
//         }

//         if(!adress1){
//             adress1_error = "adress1 is required";
//             $('#adress1_error').html('');
//             $('#adress1_error').html(adress1_error);
//         }else{
//             email_error = "";
//             $('#adress1_error').html('');
//         }

//         if(!adress2){
//             adress2_error = "adress2 is required";
//             $('#adress2_error').html('');
//             $('#adress2_error').html(adress2_error);
//         }else{
//             email_error = "";
//             $('#adress2_error').html('');
//         }

//         if(!city){
//             city_error = "city is required";
//             $('#city_error').html('');
//             $('#city_error').html(city_error);
//         }else{
//             email_error = "";
//             $('#city_error').html('');
//         }

//         if(!state){
//             state_error = "state is required";
//             $('#state_error').html('');
//             $('#state_error').html(state_error);
//         }else{
//             email_error = "";
//             $('#state_error').html('');
//         }

//         if(!country){
//             country_error = "country is required";
//             $('#country_error').html('');
//             $('#country_error').html(country_error);
//         }else{
//             email_error = "";
//             $('#country_error').html('');
//         }

//         if(!pincode){
//             pincode_error = "pincode is required";
//             $('#pincode_error').html('');
//             $('#pincode_error').html(pincode_error);
//         }else{
//             email_error = "";
//             $('#pincode_error').html('');
//         }


//         if(fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || adress1_error != '' || adress2_error != '' || city_error != '' || state_error != '' || country_error != '' || pincode_error != ''  ){
//                 return false;
//         }else{

//             var data = {
//                 'firstname' : firstname,
//                 'lastname' : lastname,
//                 'email' : email,
//                 'phone' : phone,
//                 'adress1' : adress1,
//                 'adress2' : adress2,
//                 'city' : city,
//                 'state' : state,
//                 'country' : country,
//                 'pincode' : pincode,
//             };
//             $.ajax({
//                 method: "POST",
//                 url: "proceed-to-pay",
//                 data: data,
//                 success: function (response) {
//                     alert(response.total_price)

//                 },
//                 error:function(err){
//                     console.log(err);
//                 }
//             });

//         }

//     });
// });
$(document).ready(function () {
    $('.razorpay_btn').click(function (e) {
        e.preventDefault();

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


        var fname_error = '';
        var lname_error = '';
        var email_error = '';
        var phone_error = '';
        var adress1_error = '';
        var adress2_error = '';
        var city_error = '';
        var state_error = '';
        var country_error = '';
        var pincode_error = '';

        if (!firstname) {
            fname_error = "First Name is required";
            $('#fname_error').html(fname_error);
        } else {
            $('#fname_error').html('');
        }

        if (!lastname) {
            lname_error = "last Name is required";
            $('#lname_error').html(lname_error);
        } else {
            $('#lname_error').html('');
        }

        if (!email) {
            email_error = "email is required";
            $('#email_error').html(email_error);
        } else {
            $('#email_error').html('');
        }

        if (!phone) {
            phone_error = "phone is required";
            $('#phone_error').html(phone_error);
        } else {
            $('#phone_error').html('');
        }

        if (!adress1) {
            adress1_error = "adress1 is required";
            $('#adress1_error').html(adress1_error);
        } else {
            $('#adress1_error').html('');
        }

        if (!adress2) {
            adress2_error = "adress2 is required";
            $('#adress2_error').html(adress2_error);
        } else {
            $('#adress2_error').html('');
        }

        if (!city) {
            city_error = "city is required";
            $('#city_error').html(city_error);
        } else {
            $('#city_error').html('');
        }

        if (!state) {
            state_error = "state is required";
            $('#state_error').html(state_error);
        } else {
            $('#state_error').html('');
        }

        if (!country) {
            country_error = "country is required";
            $('#country_error').html(country_error);
        } else {
            $('#country_error').html('');
        }

        if (!pincode) {
            pincode_error = "pincode is required";
            $('#pincode_error').html(pincode_error);
        } else {
            $('#pincode_error').html('');
        }

        if (
            fname_error !== '' ||
            lname_error !== '' ||
            email_error !== '' ||
            phone_error !== '' ||
            adress1_error !== '' ||
            adress2_error !== '' ||
            city_error !== '' ||
            state_error !== '' ||
            country_error !== '' ||
            pincode_error !== ''
        ) {
            return false;
        } else {
            var data = {
                fname: response.firstname,
                lname: response.lastname,
                email: response.email,
                phone: response.phone,
                adress1: response.adress1,
                adress2: response.adress2,
                city: response.city,
                state: response.state,
                country: response.country,
                pincode: responsea.pincode,
                payment_mode :"pay with paypal",
                payment_id: responsea.razorpay_payment_id
            };

            $.ajax({
                method: "POST",
                url: "proceed-to-pay",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                },
                success: function (response) {
                    alert(response.total_price);
                },
                error: function (err) {
                    console.log(err);
                },
            });
        }
    });
});
