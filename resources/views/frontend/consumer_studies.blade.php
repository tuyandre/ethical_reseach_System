@extends('frontend.shared.master')
@section('title','Ethical')
@section('css')
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41470585515_Testimonial_slider.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/hub_generated/module_assets/41591695382/1613452818768/module_41591695382_Whitepapers.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/hub_generated/module_assets/41591730730/1613644458880/module_41591730730_Advanced_Image_Gallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/hub_generated/module_assets/41589161871/1613546416356/module_41589161871_Content_With_image_Column.min.css')}}">
@endsection
@section('banner-section')

    <div class="container-fluid banner-area">
        <div class="row-fluid-wrapper">
            <div class="row-fluid">
                <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                    <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd-section DND_banner-row-0-force-full-width-section">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                <div id="hs_cos_wrapper_DND_banner-module-1" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                    <div class="banner-wrapper ">
                                        <div class="banner" style="background-color: rgba(248, 249, 250,1.0);">
                                            <div class="page-center">
                                                <div class="custom-row">
                                                    <div class="custom-col-7">
                                                        <h1>{{__('consumer.text_1')}}</h1>
                                                        <div class="btn-container"> <a data-popup="modal" class="hs-button" href="#book-a-demo">{{__('consumer.text_2')}}</a>
                                                        </div>
                                                    </div>
                                                    <div class="custom-col-5 banner-image-column">
                                                        <img class="show-in-desktop" src="{{asset('/public/frontend/images/consumer-research-dashboard.png')}}" alt="consumer research" loading="lazy">
                                                        <img class="show-in-mobile" src="{{asset('/public/frontend/images/consumer-research-dashboard_2.png')}}" alt="consumer research" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('frontend.shared.partials.book-demo')
                                </div>
                            </div>
                        </div>
                        <style>
                            .banner-wrapper .page-center {
                                padding-top: 4.375rem;
                                padding-bottom: 3.125rem;
                            }
                            @media (max-width: 991px) {
                                .banner-wrapper .page-center {
                                    padding-top: 1.25rem;
                                    padding-bottom: 3.125rem;
                                }
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('content')


    <div class="container-fluid body-container body-container__website">
        <div class="row-fluid-wrapper">
            <div class="row-fluid">
                <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                    <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd-section dnd_area-row-0-padding">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-2 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_dnd_area-module-3" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text"
                                                 style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <span id="hs_cos_wrapper_dnd_area-module-3_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text"
                                                      style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><h2 style="text-align: center; margin: 0;">
                                                        <big>{{__('consumer.text_3')}}</big></h2><h4 style="text-align: center; margin-bottom: 0;">{{__('consumer.text_4')}}</h4></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid-wrapper row-depth-1 row-number-3 dnd_area-row-1-padding dnd-section">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-4 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613389374607" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="content-with-image-col left-aign">
                                                    <div class="image">
                                                        <img src="{{asset('/public/frontend/images/questionnaire-survey-099821c7575d10671f301cf488120ef79eb1f490827f89fe383d9dd39ecaa93b.png')}}"
                                                             alt="Surveys" loading="lazy" style="max-width: 100%; height: auto;">
                                                    </div>
                                                    <div class="content"> <span class="topic">{{__('consumer.text_5')}}</span>
                                                        <h2 class="heading"><strong>{{__('consumer.text_6')}}</strong><br>{{__('consumer.text_7')}}</h2>
                                                        <h3 class="content">{{__('consumer.text_8')}}</h3>  <a class="explore-btn" href="{{route('frontend.consumer.questionnaire')}}">
                                                            {{__('consumer.text_9')}} <i class="material-icons ml-1">arrow_forward</i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid-wrapper row-depth-1 row-number-5 dnd_area-row-2-padding dnd-section dnd_area-row-2-vertical-alignment">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column dnd_area-column-2-vertical-alignment" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-6 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_module_1613389384063" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module"
                                                 style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="content-with-image-col right-align">
                                                    <div class="content"> <span class="topic">{{__('consumer.text_10')}}</span>
                                                        <h2 class="heading"><strong>{{__('consumer.text_11')}}</strong><br>{{__('consumer.text_12')}}</h2>
                                                        <h3 class="content">{{__('consumer.text_13')}}</h3>  <a class="explore-btn" href="{{route('frontend.consumer.sampling')}}">{{__('consumer.text_14')}}
                                                            <i class="material-icons ml-1">arrow_forward</i> </a>
                                                    </div>
                                                    <div class="image">
                                                        <img src="{{asset('/public/frontend/images/respondent-targeting-dfd72dd54db8c609c527762a7e75485542afbbfc0237dde26656df0b279c8287.png')}}" alt="Targeting" loading="lazy" style="max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid-wrapper row-depth-1 row-number-7 dnd-section dnd_area-row-3-padding dnd_area-row-3-vertical-alignment">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell cell_16133896153802-vertical-alignment dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-8 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_module_16133896153804" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="content-with-image-col left-aign">
                                                    <div class="image">
                                                        <img src="{{asset('/public/frontend/images/analytics-data-2d4adf4ab8ea638c74f2ac8a013912f2fc3469a93982dc9f9e9454236eff5cf7.png')}}"
                                                             alt="Reports" loading="lazy" style="max-width: 100%; height: auto;">
                                                    </div>
                                                    <div class="content"> <span class="topic">{{__('consumer.text_15')}}</span>
                                                        <h2 class="heading"><strong>{{__('consumer.text_16')}}</strong><br>{{__('consumer.text_17')}}</h2>
                                                        <h3 class="content">{{__('consumer.text_18')}}</h3>  <a class="explore-btn" href="{{route('frontend.consumer.data_visualization')}}">
                                                            {{__('consumer.text_19')}} <i class="material-icons ml-1">arrow_forward</i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid-wrapper row-depth-1 row-number-9 dnd-section dnd_area-row-4-padding dnd_area-row-4-vertical-alignment">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column cell_16133897102442-vertical-alignment" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-10 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_module_16133897102444" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="content-with-image-col right-align">
                                                    <div class="content"> <span class="topic">{{__('consumer.text_20')}}</span>
                                                        <h2 class="heading"><strong>{{__('consumer.text_21')}}</strong><br>{{__('consumer.text_22')}}</h2>
                                                        <h3 class="content">{{__('consumer.text_23')}}</h3>  <a class="explore-btn" href="{{route('frontend.consumer.data_analysis')}}"> {{__('consumer.text_24')}}
                                                            <i class="material-icons ml-1">arrow_forward</i> </a>
                                                    </div>
                                                    <div class="image">
                                                        <img src="{{asset('/public/frontend/images/dashboard-results-038ea972d28d1ac7184fef84455980d0c2d13213f3f6ca8a9ffa9a93539408ba.png')}}" alt="From raw data " loading="lazy" style="max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('frontend.shared.partials.testimonials')
                    <div class="row-fluid-wrapper row-depth-1 row-number-13 dnd_area-row-6-padding dnd-section">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-14 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613390036520" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="whitepapers">
                                                    <div class="custom-row">
                                                        <div class="section-header">
                                                            <h2>{{__('consumer.text_25')}}</h2>
                                                            <h3>{{__('consumer.text_26')}}</h3>
                                                        </div>
                                                    </div>
                                                    <div class="custom-row whitepapers-container">
                                                        <div class="custom-col-4 whitepapers-item">
                                                            <img src="{{asset('/public/frontend/images//insights-driven-consumer-research-fb4bafc34161452e656b08add2ec11f53735c1856e29f882bd3c6c6d9eb82567.png')}}"
                                                                 alt="Grow 2X faster with new research methods." loading="lazy" style="max-width: 100%; height: auto;">
                                                            <h3 class="heading">{{__('consumer.text_27')}}</h3>
                                                            <h4 class="sub-heading">{{__('consumer.text_28')}}</h4>  <a class="read-more-link" href="{{url('/')}}" target="_blank" rel="noopener"> {{__('consumer.text_29')}}
                                                                <i class="material-icons ml-1">arrow_forward</i> </a>
                                                        </div>
                                                        <div class="custom-col-4 whitepapers-item">
                                                            <img src="{{asset('/public/frontend/images/future-shopping-centers-america-611dd952eb87c6476c0880cca3ae0bfaef6c76d15f48d06eb4f9bd8e18b830bc.png')}}"
                                                                 alt="How American shopping malls can stay ahead of the curb." loading="lazy" style="max-width: 100%; height: auto;">
                                                            <h3 class="heading">{{__('consumer.text_30')}}</h3>
                                                            <h4 class="sub-heading">{{__('consumer.text_32')}}</h4>  <a class="read-more-link" href="{{url('/')}}" target="_blank" rel="noopener">
                                                                {{__('consumer.text_29')}} <i class="material-icons ml-1">arrow_forward</i> </a>
                                                        </div>
                                                        <div class="custom-col-4 whitepapers-item">
                                                            <img src="{{asset('/public/frontend/images/future-shopping-centers-canada-8f2429cdde7dfb68b8f65d8bf79958422b8a2b6a09c939b9f9f0e86356b4aeed.png')}}"
                                                                 alt="How shopping malls can thrive in the age of the online shopper." loading="lazy" style="max-width: 100%; height: auto;">
                                                            <h3 class="heading"> {{__('consumer.text_31')}}</h3>
                                                            <h4 class="sub-heading"> {{__('consumer.text_32')}}</h4>  <a class="read-more-link" href="{{url('/')}}" target="_blank" rel="noopener">
                                                                {{__('consumer.text_29')}}<i class="material-icons ml-1">arrow_forward</i> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid-wrapper row-depth-1 row-number-15 dnd-section dnd_area-row-7-padding">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-16 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613390159672" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="advanced-image-gallery">
                                                    <div class="image-wrapper">
                                                        <img class="image1" src="{{asset('/public/frontend/images/clients/client-5.png')}}" alt="Ipsos">
                                                        <img class="image2" src="{{asset('/public/frontend/images/clients/client-6.png')}}" alt="Positive Insights ">
                                                        <img class="image3" src="{{asset('/public/frontend/images/clients/client-4.png')}}" alt="Africa360">
                                                        <img class="image4" src="{{asset('/public/frontend/images/clients/client-1.png')}}" alt="Malana Research">
                                                        <img class="image5" src="{{asset('/public/frontend/images/clients/client-3.png')}}" alt="Nielsen">
                                                        <img class="image6" src="{{asset('/public/frontend/images/clients/client-2.png')}}" alt="MKT Research">
                                                    </div>
                                                </div>
                                                <style>
                                                    .image1{width:62px}@media (max-width: 991px){.image1{width:31px}}.image2{width:100px}@media (max-width: 991px){.image2{width:42px}}.image3{width:106px}
                                                    @media (max-width: 991px){.image3{width:53px}}.image4{width:100px}
                                                    @media (max-width: 991px){.image4{width:50px}}.image5{width:110px}@media (max-width: 991px){.image5{width:55px}}.image6{width:110px}
                                                    @media (max-width: 991px){.image6{width:55px}}
                                                </style>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid-wrapper row-depth-1 row-number-17 dnd-section dnd_area-row-8-background-color">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-18 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget widget_1613390379279-margin dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613390379279" class="hs_cos_wrapper hs_cos_wrapper_widget
                                             hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <span id="hs_cos_wrapper_widget_1613390379279_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text"
                                                      style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                                    <h6 style="text-align: center; margin: 0;"> {{__('consumer.text_33')}}</h6><h4 style="text-align: center; margin-top: 20px;"> {{__('consumer.text_34')}}</h4></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid-wrapper row-depth-1 row-number-3 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613471317961" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="btn-md-wrapper">
                                                    <div class="btn-container center" style="padding-top:3px; padding-bottom:3px;">
                                                        <a data-popup="modal" class="hs-button" href="#book-a-demowidget_1613471317961"> {{__('consumer.text_35')}}</a>
                                                    </div>
                                                </div>@include('frontend.shared.partials.book-demomodalwidget')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
@section('js')
<script src="{{asset('/public/frontend/hub_generated/module_assets/41470585515/1613644587174/module_41470585515_Testimonial_slider.min.js')}}"></script>
@endsection
