<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158346953-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-158346953-1');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('section') from @yield('site')">
    <meta name="author" content="Travel">
    <title>{{$destination->name."Xpertz"}} | @yield('section')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icono.ico') }}"/>

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('layerslider/css/layerslider.css') }}" rel="stylesheet">

    <style>
        div.timeline > div.mb-5 > p > span {
            font-weight: bolder;
            font-size: 20px;
        }
    </style>


</head>
<body>
<div id="page">
    @component('layouts.components.header', ['city'=>$city ?? 'none', 'place'=>$place??'none', "destination"=>$destination])
    @endcomponent
    <main>
        @yield('content')
    </main>
    <!-- /main -->
@component('layouts.components.footer', ['city'=>$city ?? 'none', 'place' => $place ?? 'none', "destination"=>$destination])
@endcomponent
<!--/footer-->
</div>
<!-- page -->

<!-- Sign In Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <!--
        <div class="small-dialog-header">
            <h3>Sign In</h3>
        </div>

        <form>
            <div class="sign-in-wrapper">
                <a href="#0" class="social_bt facebook">Login with Facebook</a>
                <a href="#0" class="social_bt google">Login with Google</a>
                <div class="divider"><span>Or</span></div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                    <i class="icon_lock_alt"></i>
                </div>
                <div class="clearfix add_bottom_15">
                    <div class="checkboxes float-left">
                        <label class="container_check">Remember me
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
                </div>
                <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
                <div class="text-center">
                    Don’t have an account? <a href="register.html">Sign up</a>
                </div>
                <div id="forgot_pw">
                    <div class="form-group">
                        <label>Please confirm login email below</label>
                        <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                        <i class="icon_mail_alt"></i>
                    </div>
                    <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                    <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                </div>
            </div>
        </form>
        -->
    <!--form -->

</div>
<!-- /Sign In Popup -->

<span id="toTop_2" class="btn btn-info" style="">
          <span class="icon_phone"></span>
        </span>
<!-- Back to top button -->
<div id="toTop"></div><!-- Back to top button -->

<!-- Map
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="{{ asset('js/markerclusterer.js') }}"></script>
<script src="{{ asset('js/map_hotels.js') }}"></script>
<script src="{{ asset('js/infobox.js') }}"></script> -->

<!-- COMMON SCRIPTS -->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('js/common_scripts.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        if ($("video").prop('muted', false)) {
            $("#mute").css("background-image", "url({{asset('/img/muteon.png')}})");
        }

        $("#mute").click(function () {
            if ($("video").prop('muted')) {
                $("video").prop('muted', false);
                $("#mute").css("background-image", "url({{asset('/img/muteoff.png')}})");
            } else {
                $("video").prop('muted', true);
                $("#mute").css("background-image", "url({{asset('/img/muteon.png')}})");
            }
        });
    });
</script>
<!--<script src="{ asset('assets/validate.js') }}"></script>-->
<!-- SPECIFIC SCRIPTS -->
<script src="{{ asset('layerslider/js/greensock.js') }}"></script>
<script src="{{ asset('layerslider/js/layerslider.transitions.js') }}"></script>
<script src="{{ asset('layerslider/js/layerslider.kreaturamedia.jquery.js') }}"></script>
<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
<script>
    'use strict';
    $('#layerslider').layerSlider({
        autoStart: true,
        navButtons: false,
        navStartStop: false,
        showCircleTimer: false,
        responsive: true,
        responsiveUnder: 1280,
        layersContainer: 1200,
        skinsPath: '/layerslider/skins/'
        // Please make sure that you didn't forget to add a comma to the line endings
        // except the last line!
    });
</script>

<!-- FlexSlider -->
<script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
<script>
    $(window).load(function () {
        'use strict';
        try {
            $('#carousel_slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 280,
                itemMargin: 25,
                asNavFor: '#slider'
            });
        } catch (error) {
            //console.log(error);
        }
        try {
            $('#slider').flexslider({
                animation: "fade",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel_slider",
                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        } catch (error) {
            //console.log(error);
        }

    });

</script><!-- SPECIFIC SCRIPTS -->
<script src="{{ asset('js/video_header.js') }}"></script>
<script>
    HeaderVideo.init({
        container: $('.header-video'),
        header: $('.header-video--media'),
        videoTrigger: $("#video-trigger"),
        autoPlayVideo: true
    });
</script>
<!-- Masonry Filtering -->
<script src="{{ asset('js/isotope.min.js') }}"></script>
<script>

    $(window).load(function () {
        try {
            var $container = $('.isotope-wrapper');
            $container.isotope({itemSelector: '.isotope-item', layoutMode: 'masonry'});
        } catch (e) {
        }
    });


    $('.filters_listing').on('click', 'input', 'change', function () {
        try {
            var selector = $(this).attr('data-filter');
            $('.isotope-wrapper').isotope({filter: selector});
        } catch (e) {
        }
    });
</script>

<script>
    $(".no-action").on('click', function () {
        e.preventDefault();
        return false;
    });
</script>

@if(Session::get('message') != '')
    <script>
        $(document).ready(function () {
            Swal.fire({
                title: "{{Session::get('message')}}",
                html: "{{Session::get('message')}}"
            });
        });
    </script>
@endif


<script>

    var selectors = ["*"];

    function removeSelector(selector) {
        for (var i = 0; i < selectors.length; i++) {
            if (selectors[i] === selector) {
                selectors.splice(i, 1);
            }
        }
        if (selectors.length === 0) {
            addSelector("*");
        }
    }

    function addSelector(selector) {
        if (selectors.length === 0) {
            selectors.push(selector);
            return;
        }
        for (var i = 0; i < selectors.length; i++) {
            if (selectors[i] !== selector) {
                if (selectors.length > 0 && selector !== "*") {
                    selectors.push(selector);
                }

            }
            if (selectors[i] === "*") {
                removeSelector(selectors[i]);
            }
        }
    }

    function removeDuplicates(array) {
        return array.filter((a, b) => array.indexOf(a) === b)
    };

    function refreshFilters() {
        let selectors_list = "";

        selectors = removeDuplicates(selectors);

        for (var i = 0; i < selectors.length; i++) {
            if (selectors_list === "") {
                selectors_list = selectors[i].replace(/\//g, "-");
            } else {
                selectors_list += ", " + selectors[i];
            }
        }

        console.log(selectors_list);
        if (selectors_list === "*") {
            $("#all-items").iCheck('check');
            $("#all-itemsf").iCheck('check');
            $("#all-itemsff").iCheck('check');
            $('.swag').iCheck('uncheck');
        } else {
            $("#all-items").iCheck('uncheck');
            $("#all-itemsf").iCheck('uncheck');
            $("#all-itemsff").iCheck('uncheck');
        }

        $(".isotope-wrapper").isotope({filter: selectors_list});
    }

    var sigh = $('.swag');

    $("#all-items").on('ifChecked', function () {
        $('.swag').iCheck('uncheck');
        selectors = ["*"];
        refreshFilters();
    });

    $("#all-itemsf").on('ifChecked', function () {
        $('.swag').iCheck('uncheck');
        selectors = ["*"];
        refreshFilters();
    });

    $("#all-itemsff").on('ifChecked', function () {
        $('.swag').iCheck('uncheck');
        selectors = ["*"];
        refreshFilters();
    });


    sigh.on('ifChecked', function () {
        try {
            addSelector($(this).attr("data-filter"));
            refreshFilters();
        } catch (e) {
        }
    });

    sigh.on('ifUnchecked', function () {
        try {
            removeSelector($(this).attr("data-filter"));
            refreshFilters();
        } catch (e) {
        }
    });

    let areas_ck = $('.areaswag');

    areas_ck.on('ifChecked', function () {

    });

    $(document).ready(function () {
        let temp = "{{$area1??''}}";
        console.log("temo" + temp);
        switch (temp) {
            case "chinatown":
                addSelector(".Chinatown");
                $("#brook").iCheck('check');
                break;

            case "financial-district":
                addSelector(".FinancialDistrict");
                $("#west").iCheck('check');
                break;
            case "midtown-east":
                addSelector(".MidtownEast");
                $("#mid").iCheck('check');
                break;

            case "tribeca":
                addSelector(".TriBeCa");
                $("#east").iCheck('check');
                break;
            case "soho":
                addSelector(".SoHo");
                $("#upper").iCheck('check');
                break;
        }

        $("#all-items").iCheck('uncheck');
        $("#all-itemsf").iCheck('uncheck');
        $("#all-itemsff").iCheck('uncheck');
        refreshFilters();
    });

</script>
<script>
    $(document).ready(function () {
        let cant = $('.isotope-item').length;
        let a = $('#collapseFilters > div > ul > li:nth-child(1) > label > span');
        console.log(cant);
        a.text("All (" + cant + ")");
    });
</script>
</body>
</html>
