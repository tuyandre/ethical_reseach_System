@extends('frontend.shared.master')
@section('title','Ethical')
@push('css')
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41470585515_Testimonial_slider.min.css')}}">
@endpush
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
                                                        <h1>Join the hundreds of businesses that trust Ethical Research Solutions</h1>
                                                        <div class="btn-container"> <a data-popup="modal" class="hs-button" href="#book-a-demo">Get a quote</a>
                                                        </div>
                                                    </div>
                                                    <div class="custom-col-5 banner-image-column">
                                                        <img class="show-in-desktop" src="{{asset('/public/frontend/images/logo-customers-desktop.png')}}" alt="Logos of L'Oreal, Aldo, Mall of America, Invesco, Cushman &amp; Wakefield, Decathlon, Sobeys, CF Cadillac Fairview, SmartReit,Simon, KingSett Capital, Kiabi, Cominar, Roland Berger, Klepierre, First Capital, Carrefour, Ceetrus, Loblaws, Ivanhoe Cambridge" loading="lazy">
                                                        <img class="show-in-mobile" src="{{asset('/public/frontend/images/logo-customers-mobile.png')}}" alt="Logos of L'Oreal, Aldo, Mall of America, Invesco, Cushman &amp; Wakefield, Decathlon, Sobeys, CF Cadillac Fairview, SmartReit,Simon, KingSett Capital, Kiabi, Cominar, Roland Berger, Klepierre, First Capital, Carrefour, Ceetrus, Loblaws, Ivanhoe Cambridge" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('frontend.shared.partials.book-demo')
                                    <style>
                                        .banner-wrapper .page-center{padding-top:4.375rem;padding-bottom:4.375rem}@media (max-width: 991px){.banner-wrapper .page-center{padding-top:3.125rem;padding-bottom:3.125rem}}
                                    </style>
                                </div>
                            </div>
                        </div>
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
                            <div class="span12 widget-span widget-type-cell cell_16130431909162-padding dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                @include('frontend.shared.partials.testimonials')
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid-wrapper row-depth-1 row-number-5 dnd_area-row-2-background-color dnd-section">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell cell_16130439380892-padding dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-6 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget widget_1613043937757-margin dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613043937757" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <span id="hs_cos_wrapper_widget_1613043937757_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                                    <h6 style="text-align: center;">Better customer experience starts with better research</h6><h4 style="margin: 1.25rem 0px 0px; font-weight: 400; text-align: center;">See how Ethical Research Solutions can help you grow your bottom line</h4></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid-wrapper row-depth-1 row-number-7 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613471317961" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="btn-md-wrapper">
                                                    <div class="btn-container center" style="padding-top:px; padding-bottom:px;"> <a data-popup="modal" class="hs-button" href="#book-a-demowidget_1613471317961">Get an estimate</a>
                                                    </div>
                                                </div>
                                                @include('frontend.shared.partials.book-demomodalwidget')
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
    </div>




@endsection
@push('js')
@endpush
