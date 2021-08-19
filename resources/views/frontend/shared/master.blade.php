<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <title>Ethical Research Solutions Consumer Insights | tech-enabled consumer research</title>
    <link rel="shortcut icon" href="{{asset('/public/frontend/images/favicon.ico')}}">
    <meta name="description" content="Ethical Research Solutions is a consumer research company, extracting consumer insights by targeting
    respondents by interest or location on the social networks consumers trust.">
    <script src="{{asset('/public/frontend/js/jquery/jquery-1.7.1.js')}}"></script>
    <script>
        hsjQuery=window['jQuery'];
    </script>
    <meta property="og:description" content="Ethical Research Solutions is a consumer research company, extracting consumer insights by targeting
    respondents by interest or location on the social networks consumers trust.">
    <meta property="og:title" content="Ethical Research Solutions Consumer Insights | tech-enabled consumer research">
    <meta name="twitter:description" content="Ethical Research Solutions is a consumer research company, extracting consumer insights by
     targeting respondents by interest or location on the social networks consumers trust.">
    <meta name="twitter:title" content="Ethical Research Solutions Consumer Insights | tech-enabled consumer research">

    <link rel="stylesheet" href="{{asset('/public/frontend/css/layout.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/custom_frontend.css')}}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=DM+Sans:400,500,700&amp;display=swap">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/theme-overrides.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41462098608_menu-section.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/LanguageSwitcher.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41460985916_Banner.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41591730730_Advanced_Image_Gallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41592108289_Features.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41471930513_Button_type2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41512709220_Consumer_Research.min.css')}}">
{{--    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41470585515_Testimonial_slider.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41584063577_Bottom_Pane.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41462328234_Footer_Get_in_touch.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41462374737_Footer_Social_Icons.min.css')}}">

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=DM+Sans:regular&amp;display=swap">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="/hubfs/%5BLanding%20Page%5D%20-%20Preview%20General-1.png#keepProtocol">
    <meta property="og:image:width" content="2782">
    <meta property="og:image:height" content="1854">
    <meta property="og:url" content="">
    <meta http-equiv="content-language" content="en">


    @yield('css')

</head>

<body>
<div class="body-wrapper   hs-content-id-41620801370 hs-site-page page ">
    @include('frontend.shared.header')
</div>

@yield('banner-section')
@include('frontend.shared.partials.book-demo')
<main class="body-container-wrapper website-layout home-layout">
@yield('content')
</main>

<div data-global-resource-path="">
    @include('frontend.shared.footer')
</div>
<script type="text/javascript">

    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });

</script>
<script src="{{asset('/public/frontend/js/slick.min.js')}}"></script>
<script src="{{asset('/public/frontend/js/main.min.js')}}"></script>
<script>
    if(typeof hsVars!=='undefined'){hsVars['language']='en';}
</script>
<script src="{{asset('/public/frontend/js/bundles/project.js')}}"></script>
<script src="{{asset('/public/frontend/js/project.js')}}"></script>
<script src="{{asset('/public/frontend/js/module_41462098608_menu-section.min.js')}}"></script>
<!--[if lte IE 8]> <script charset="utf-8" src="https://js.hsforms.net/forms/v2-legacy.js"></script> <![endif]-->
<script src="{{asset('/public/frontend/js/v2.js')}}"></script>
@yield('js')
</body>

</html>
