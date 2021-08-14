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




@endsection
@push('js')
@endpush
