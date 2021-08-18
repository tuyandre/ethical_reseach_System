@extends('frontend.shared.master')
@section('title','Ethical')
@push('css')
@endpush
@section('banner-section')

    <div class="banner-section home-banner">
        <div class="container-fluid banner-area">
            <div class="row-fluid-wrapper">
                <div class="row-fluid">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd-section DND_banner-row-0-force-full-width-section">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                    <div id="hs_cos_wrapper_DND_banner-module-1" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                        <div class="banner-wrapper  padding-desktop">
                                            <div class="banner" style="background-color: rgba(248, 249, 250,1.0);">
                                                <div class="page-center">
                                                    <div class="custom-row">
                                                        <div class="custom-col-7">
                                                            <h1>{{__('welcome.discover')}}.</h1>
                                                            <div class="btn-container"> <a data-popup="modal" class="hs-button" href="#book-a-demo">{{__('welcome.get_quote')}}</a>
                                                            </div>
                                                        </div>
                                                        <div class="custom-col-5 banner-image-column">
                                                            <img class="show-in-desktop" src="{{asset('/public/frontend/images/img-3.png')}}" alt="consumer research you can act on" loading="lazy">
                                                            <img class="show-in-mobile" src="{{asset('/public/frontend/images/img-3.png')}}" alt="consumer research you can act on" loading="lazy">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        @include('frontend.shared.partials.book-demo')--}}
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
                    <!--end widget-span -->
                </div>
                <!--end row-->
            </div>
            <!--end row-wrapper -->
        </div>
        <!--end widget-span -->
    </div>


    @endsection
@section('content')

    <div class="custom-home-row1">
        <div class="container-fluid body-container body-container__website">
            <div class="row-fluid-wrapper">
                <div class="row-fluid">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd-section dnd_area1-row-0-vertical-alignment">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-cell dnd_area1-column-2-vertical-alignment dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                    <div class="row-fluid-wrapper row-depth-1 row-number-2 dnd-row">
                                        <div class="row-fluid ">
                                            <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                                <div id="hs_cos_wrapper_widget_1613469072797" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                    <div class="advanced-image-gallery">
                                                        <div class="image-wrapper">
                                                            <img class="image1" src="{{asset('/public/frontend/images/clients/client-5.png')}}" alt="Ipsos">
                                                            <img class="image2" src="{{asset('/public/frontend/images/clients/client-6.png')}}" alt="Positive Insights ">
                                                            <img class="image3" src="{{asset('/public/frontend/images/clients/client-4.png')}}" alt="Africa360">
                                                            <img class="image4" src="{{asset('/public/frontend/images/clients/client-1.png')}}" alt="Malana Research">
                                                            <img class="image5" src="{{asset('/public/frontend/images/clients/client-3.png')}}" alt="Nielsen">
                                                            <img class="image6" src="{{asset('/public/frontend/images/clients/client-2.png')}}" alt="MKT Research">
                                                        </div>
                                                        <div class="custom-trust-col"> <a class="trust-us" href="#">See the companies that trust us<i class="material-icons position-absolute ml-1">arrow_forward</i></a>
                                                        </div>
                                                    </div>
                                                    <style>
                                                        .image1{
                                                            width:62px;
                                                        }
                                                        @media (max-width: 991px){
                                                            .image1{
                                                                width:31px;
                                                            }
                                                        }

                                                        .image2{
                                                            width:92px;
                                                        }
                                                        @media (max-width: 991px){
                                                            .image2{
                                                                width:42px;
                                                            }
                                                        }

                                                        .image3{
                                                            width:106px;
                                                        }
                                                        @media (max-width: 991px){
                                                            .image3{
                                                                width:53px;
                                                            }
                                                        }

                                                        .image4{
                                                            width:100px;
                                                        }
                                                        @media (max-width: 991px){
                                                            .image4{
                                                                width:50px;
                                                            }
                                                        }

                                                        .image5{
                                                            width:110px;
                                                        }
                                                        @media (max-width: 991px){
                                                            .image5{
                                                                width:55px;
                                                            }
                                                        }

                                                        .image6{
                                                            width:110px;
                                                        }
                                                        @media (max-width: 991px){
                                                            .image6{
                                                                width:55px;
                                                            }
                                                        }
                                                    </style>
                                                </div>
                                            </div>
                                            <!--end widget-span -->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end row-wrapper -->
                                </div>
                                <!--end widget-span -->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end row-wrapper -->
                    </div>
                    <!--end widget-span -->
                </div>
            </div>
        </div>
    </div>

    <div class="custom-home-row2">
        <div class="container-fluid body-container body-container__website">
            <div class="row-fluid-wrapper">
                <div class="row-fluid">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd_area2-row-0-vertical-alignment dnd-section">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-cell dnd-column dnd_area2-column-1-vertical-alignment" style="" data-widget-type="cell" data-x="0" data-w="12">
                                    <div class="row-fluid-wrapper row-depth-1 row-number-2 dnd-row">
                                        <div class="row-fluid ">
                                            <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                                <div id="hs_cos_wrapper_dnd_area2-module-2" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                    <span id="hs_cos_wrapper_dnd_area2-module-2_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                                        <h2 style="text-align: center;">{{__('welcome.get_insights')}}</h2>
													<h4 style="text-align: center;">{{__('welcome.social_sampling')}}</h4></span>
                                                </div>
                                            </div>
                                            <!--end widget-span -->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end row-wrapper -->
                                    <div class="row-fluid-wrapper row-depth-1 row-number-3 dnd-row">
                                        <div class="row-fluid ">
                                            <div class="span12 widget-span widget-type-custom_widget widget_1613469457865-flexbox-positioning dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                                <div id="hs_cos_wrapper_widget_1613469457865" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-linked_image" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                    <span id="hs_cos_wrapper_widget_1613469457865_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_linked_image" style="" data-hs-cos-general-type="widget" data-hs-cos-type="linked_image">
                                                        <img src="{{asset('/public/frontend/images//img-1.png')}}" class="hs-image-widget " style="max-width: 100%; height: auto;" alt="dashboard"></span>
                                                </div>
                                            </div>
                                            <!--end widget-span -->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end row-wrapper -->
                                </div>
                                <!--end widget-span -->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end row-wrapper -->
                    </div>
                    <!--end widget-span -->
                </div>
            </div>
        </div>
    </div>
    <div class="custom-home-row3">
        <div class="container-fluid body-container body-container__website">
            <div class="row-fluid-wrapper">
                <div class="row-fluid">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd-section dnd_area3-row-0-padding dnd_area3-row-0-vertical-alignment">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-cell dnd_area3-column-1-vertical-alignment dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                    <div class="row-fluid-wrapper row-depth-1 row-number-2 dnd-row">
                                        <div class="row-fluid ">
                                            <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                                <div id="hs_cos_wrapper_widget_1613469552289" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                    <div class="custom-feature-wrap">
                                                        <div class="custom-feature-item">
                                                            <div class="custom-feature-inner">
                                                                <div class="custom-image">
                                                                    <img src="{{asset('/public/frontend/images/survey-icon04.svg')}}" alt="Survey example mockup with black lines" loading="lazy" style="max-width: 100%; height: auto;">
                                                                </div>
                                                                <h5>{{__('welcome.survey_people')}}</h5>
                                                                <p>{{__('welcome.media_feeds')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="custom-feature-item">
                                                            <div class="custom-feature-inner">
                                                                <div class="custom-image">
                                                                    <img src="{{asset('/public/frontend/images/geofencing-customers.svg')}}" alt="Reach any audience, anywhere" loading="lazy" style="max-width: 100%; height: auto;">
                                                                </div>
                                                                <h5>{{__('welcome.anywhere')}}</h5>
                                                                <p>{{__('welcome.geofence')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="custom-feature-item">
                                                            <div class="custom-feature-inner">
                                                                <div class="custom-image">
                                                                    <img src="{{asset('/public/frontend/images/data-insights-icon.svg')}}" alt="Target any niche consumer group" loading="lazy" style="max-width: 100%; height: auto;">
                                                                </div>
                                                                <h5>{{__('welcome.consumer_group')}}</h5>
                                                                <p>{{__('welcome.gettoknow')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="custom-feature-item">
                                                            <div class="custom-feature-inner">
                                                                <div class="custom-image">
                                                                    <img src="{{asset('/public/frontend/images/research-team-icon.svg')}}" alt="Better data quality guaranteed" loading="lazy" style="max-width: 100%; height: auto;">
                                                                </div>
                                                                <h5>{{__('welcome.data_quality')}}</h5>
                                                                <p>{{__('welcome.no_incentives')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end widget-span -->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end row-wrapper -->
                                    <div class="row-fluid-wrapper row-depth-1 row-number-3 dnd-row">
                                        <div class="row-fluid ">
                                            <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                                <div id="hs_cos_wrapper_widget_1613471317961" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                    <div class="btn-md-wrapper">
                                                        <div class="btn-container center" style="padding-top:5px; padding-bottom:5px;"> <a data-popup="modal" class="hs-button" href="#book-a-demowidget_1613471317961">{{__('welcome.get_quote')}}</a>
                                                        </div>
                                                    </div>
                                                    @include('frontend.shared.partials.book-demomodalwidget')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end widget-span -->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end row-wrapper -->
                    </div>
                    <!--end widget-span -->
                </div>
                <!--end row-->
            </div>
            <!--end row-wrapper -->
        </div>
        <!--end widget-span -->
    </div>


    <div class="custom-home-row4">
        <div class="container-fluid body-container body-container__website">
            <div class="row-fluid-wrapper">
                <div class="row-fluid">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd_area4-row-0-force-full-width-section dnd_area4-row-0-padding dnd-section dnd_area4-row-0-vertical-alignment">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-cell dnd_area4-column-1-vertical-alignment dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                    <div class="row-fluid-wrapper row-depth-1 row-number-2 dnd-row">
                                        <div class="row-fluid ">
                                            <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                                <div id="hs_cos_wrapper_widget_1613469573838" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                    <div class="custom-consumer-research-group four-column">
                                                        <div class="page-center">
                                                            <div class="custom-consumer-research-top">
                                                                <h2>{{__('welcome.newstandard')}}</h2>
                                                            </div>
                                                            <div class="custom-consumer-research-wrap">
                                                                <div class="custom-consumer-research-item">
                                                                    <h1>189</h1>
                                                                    <p>{{__('welcome.foot_print')}}</p>
                                                                </div>
                                                                <div class="custom-consumer-research-item">
                                                                    <h1>900K</h1>
                                                                    <p>{{__('welcome.success')}}</p>
                                                                </div>
                                                                <div class="custom-consumer-research-item">
                                                                    <h1>54M</h1>
                                                                    <p>{{__('welcome.answers')}}</p>
                                                                </div>
                                                                <div class="custom-consumer-research-item">
                                                                    <h1>4.14B</h1>
                                                                    <p>{{__('welcome.panel')}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end widget-span -->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end row-wrapper -->
                                </div>
                                <!--end widget-span -->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end row-wrapper -->
                    </div>
                    <!--end widget-span -->
                </div>
            </div>
        </div>
    </div>


    <div class="custom-home-row5">
        <div class="container-fluid body-container body-container__website">
            <div class="row-fluid-wrapper">
                <div class="row-fluid">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd-section dnd_area5-row-0-vertical-alignment">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-cell dnd_area5-column-1-vertical-alignment dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                @include('frontend.shared.partials.testimonials')
                                <!--end row-wrapper -->
                                </div>
                                <!--end widget-span -->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end row-wrapper -->
                    </div>
                    <!--end widget-span -->
                </div>
            </div>
        </div>
    </div>
    <div class="custom-home-row6">
        <div class="container-fluid body-container body-container__website">
            <div class="row-fluid-wrapper">
                <div class="row-fluid">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd_area6-row-0-padding dnd_area6-row-0-vertical-alignment dnd-section dnd_area6-row-0-force-full-width-section">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-cell dnd_area6-column-1-vertical-alignment dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                    <div class="row-fluid-wrapper row-depth-1 row-number-2 dnd-row">
                                        <div class="row-fluid ">
                                            <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                                <div id="hs_cos_wrapper_widget_1613469691379" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                    <div class="custom-bottom-pane-group">
                                                        <div class="page-center">
                                                            <div class="custom-bottom-pane-wrap">
                                                                <h4>{{__('welcome.loop')}}</h4>
                                                                <p>{{__('welcome.frequency')}}</p>
                                                                <div class="subscription-form"> <span id="hs_cos_wrapper_widget_1613469691379_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_form" style="" data-hs-cos-general-type="widget" data-hs-cos-type="form">
                                                                        <h3 id="hs_cos_wrapper_form_545670272_title" class="hs_cos_wrapper form-title" data-hs-cos-general-type="widget_field" data-hs-cos-type="text"></h3>

																	<div id="hs_form_target_form_545670272">
																	<form novalidate="" accept-charset="UTF-8" action="#" enctype="multipart/form-data"  method="POST" class="hs-form stacked hs-custom-form hs-form-private hsForm_8b5d4ae0-3a81-467a-8b09-bc7aac54c846 hs-form-8b5d4ae0-3a81-467a-8b09-bc7aac54c846
																	hs-form-8b5d4ae0-3a81-467a-8b09-bc7aac54c846_a2dbc56a-d9d3-45f9-afb7-15d8fc97acd2" data-form-id="8b5d4ae0-3a81-467a-8b09-bc7aac54c846" data-portal-id="2851660" target="target_iframe_8b5d4ae0-3a81-467a-8b09-bc7aac54c846_4303" data-reactid=".hbspt-forms-1">
                                                                        <div class="hs_email hs-email hs-fieldtype-text field hs-form-field" data-reactid=".hbspt-forms-1.1:$0">
                                                                            <label id="label-email-8b5d4ae0-3a81-467a-8b09-bc7aac54c846_4303" class="" placeholder="Enter your Email address" for="email-8b5d4ae0-3a81-467a-8b09-bc7aac54c846_4303" data-reactid=".hbspt-forms-1.1:$0.0">
                                                                                <span data-reactid=".hbspt-forms-1.1:$0.0.0">Email address</span>
                                                                                <span class="hs-form-required" data-reactid=".hbspt-forms-1.1:$0.0.1">*</span>
																	</label>
																	<legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-1.1:$0.1"></legend>
																	<div class="input" data-reactid=".hbspt-forms-1.1:$0.$email">
																		<input id="email-8b5d4ae0-3a81-467a-8b09-bc7aac54c846_4303" class="hs-input" type="email" name="email" required="" placeholder="Enter your work email" value="" autocomplete="email" data-reactid=".hbspt-forms-1.1:$0.$email.0" inputmode="email">
																	</div>
																</div>
																<div class="hs_lifecyclestage hs-lifecyclestage hs-fieldtype-radio field hs-form-field" style="display:none;" data-reactid=".hbspt-forms-1.1:$1">
																	<label id="label-lifecyclestage-8b5d4ae0-3a81-467a-8b09-bc7aac54c846_4303" class="" placeholder="Enter your Lifecycle Stage" for="lifecyclestage-8b5d4ae0-3a81-467a-8b09-bc7aac54c846_4303" data-reactid=".hbspt-forms-1.1:$1.0">
                                                                        <span data-reactid=".hbspt-forms-1.1:$1.0.0">Lifecycle Stage</span>
																	</label>
																	<legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-1.1:$1.1"></legend>
																	<div class="input" data-reactid=".hbspt-forms-1.1:$1.$lifecyclestage">
																		<input name="lifecyclestage" class="hs-input" type="hidden" value="subscriber" data-reactid=".hbspt-forms-1.1:$1.$lifecyclestage.0">
																	</div>
																</div>
																<noscript data-reactid=".hbspt-forms-1.2"></noscript>
																<div class="hs_submit hs-submit" data-reactid=".hbspt-forms-1.5">
																	<div class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-1.5.0"></div>
																	<div class="actions" data-reactid=".hbspt-forms-1.5.1">
																		<input type="submit" value="Subscribe" class="hs-button primary large" data-reactid=".hbspt-forms-1.5.1.0">
																	</div>
																</div>
																<noscript data-reactid=".hbspt-forms-1.6"></noscript>
																<iframe name="target_iframe_8b5d4ae0-3a81-467a-8b09-bc7aac54c846_4303" style="display:none;" data-reactid=".hbspt-forms-1.8"></iframe>
																</form>
															</div>
															</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end widget-span -->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end row-wrapper -->
                                </div>
                                <!--end widget-span -->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end row-wrapper -->
                    </div>
                    <!--end widget-span -->
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
@endpush
