<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('front_assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('front_assets/images/apple-touch-icon.png')}}">

    {{-- Font Awesome CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('admin_assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/custom.css')}}">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    @include('cdshop.layouts.header')

    @yield('content')

    @include('cdshop.layouts.footer')





    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('front_assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('front_assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('front_assets/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('front_assets/js/jquery.superslides.min.js')}}"></script>
    <script src="{{ asset('front_assets/js/bootstrap-select.js')}}"></script>
    <script src="{{ asset('front_assets/js/inewsticker.js')}}"></script>
    <script src="{{ asset('front_assets/js/bootsnav.js')}}"></script>
    <script src="{{ asset('front_assets/js/images-loded.min.js')}}"></script>
    <script src="{{ asset('front_assets/js/isotope.min.js')}}"></script>
    <script src="{{ asset('front_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('front_assets/js/baguetteBox.min.js')}}"></script>
    <script src="{{ asset('front_assets/js/form-validator.min.js')}}"></script>
    <script src="{{ asset('front_assets/js/contact-form-script.js')}}"></script>
    <script src="{{ asset('front_assets/js/custom.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#selSize').change(function(){
                //alert("Test");
                var idSize = $(this).val();
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/get/product/price',
                    data:{
                        idSize:idSize
                    },
                    success:function(res){
                        var arr = res.split('#');
                        $('#getPrice').html('Product Price: $' + arr[0]);

                    },
                    error:function(error){
                        alert('Try Again');
                    }
                });
            });
        });
    </script>
</body>

</html>
