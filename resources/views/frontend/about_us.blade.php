@extends('frontend.shared.master')
@section('title','Ethical')
@push('css')
    <link rel="stylesheet" href="{{asset('/public/frontend/css/module_41584317147_Our_offices.min.css')}}">
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
                                                        <h1 style="padding-bottom: 0.625rem;">{{__('about.text_1')}}</h1>
                                                        <div class="btn-container"> <a class="hs-button" href="{{route('frontend.careers')}}">{{__('about.text_2')}}</a>
                                                        </div>
                                                    </div>
                                                    <div class="custom-col-5 banner-image-column">
                                                        <img class="show-in-desktop" src="{{asset('/public/frontend/images/consumers.png')}}" alt="About" loading="lazy">
                                                        <img class="show-in-mobile" src="{{asset('/public/frontend/images/consumers_2.png')}}" alt="About" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                    <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd_area-row-0-vertical-alignment dnd-section dnd_area-row-0-padding">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column dnd_area-column-2-vertical-alignment" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-2 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_dnd_area-module-3" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <span id="hs_cos_wrapper_dnd_area-module-3_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                                    <h3 style="margin-bottom: 0;"><big>{{__('about.text_3')}}</big></h3><p>{{__('about.text_4')}} <br><br>{{__('about.text_5')}} <br><br>{{__('about.text_6')}}<br><br><strong>{{__('about.text_15')}}</strong></p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid-wrapper row-depth-1 row-number-3 dnd_area-row-1-padding dnd-section dnd_area-row-1-force-full-width-section">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-4 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613372101314" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module"
                                                 style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="custom-consumer-research-group three-column">
                                                    <div class="page-center">
                                                        <div class="custom-consumer-research-wrap">
                                                            <div class="custom-consumer-research-item">
                                                                <h1>2016</h1>
                                                                <p>{{__('about.text_7')}}</p>
                                                            </div>

                                                            <div class="custom-consumer-research-item">
                                                                <h1>20</h1>
                                                                <p>{{__('about.text_8')}}</p>
                                                            </div>
                                                            <div class="custom-consumer-research-item">
                                                                <h1 class="image-wrapper"> <img src="{{asset('/public/frontend/images/infinite-questions.svg')}}" alt="Questions we can answer" loading="lazy" style="max-width: 100%; height: auto;"></h1>
                                                                <p>{{__('about.text_9')}}</p>
                                                            </div>
                                                            <div class="custom-consumer-research-item">
                                                                <h1>2</h1>
                                                                <p>{{__('about.text_10')}}</p>
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
                    <div class="row-fluid-wrapper row-depth-1 row-number-5 dnd_area-row-2-padding dnd-section">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-6 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613372238420" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="leadership-team">
                                                    <div class="custom-row">
                                                        <div class="leadership-title">
                                                            <h2>{{__('about.text_11')}}</h2>
                                                        </div>
                                                    </div>
                                                    <div class="custom-row">
                                                        <div class="custom-col-4 hs-item">
                                                            <img src="{{asset('/public/images/user.png')}}" alt="Elias niyonsaba" loading="lazy" style="max-width: 100%; height: auto;">
                                                            <div class="heading"> <a href="https://www.linkedin.com/in/eliasniyonsaba/" target="_blank" rel="noopener">Elias Niyonsaba</a>
                                                            </div>
                                                            <div class="designation">CEO</div>
                                                        </div>
                                                        <div class="custom-col-4 hs-item">
                                                            <img src="{{asset('/public/images/user.png')}}" alt="Thieryy Ndabihayimana" loading="lazy" style="max-width: 100%; height: auto;">
                                                            <div class="heading"> <a href="https://www.linkedin.com/in/thierryndabihayimana/" target="_blank" rel="noopener">Thierry Ndabihayimana</a>
                                                            </div>
                                                            <div class="designation">CTO</div>
                                                        </div>
                                                        <div class="custom-col-4 hs-item">
                                                            <img src="{{asset('/public/images/user.png')}}" alt="Mahoro Felix" loading="lazy" style="max-width: 100%; height: auto;">
                                                            <div class="heading"> <a href="https://www.linkedin.com/in/mahorofelix/" target="_blank" rel="noopener">Mahoro Felix</a>
                                                            </div>
                                                            <div class="designation">CRO</div>
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

                    <div class="row-fluid-wrapper row-depth-1 row-number-9 dnd-section dnd_area-row-4-background-color dnd_area-row-4-padding">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-10 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613372552426" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="our-offices">
                                                    <h2 class="title">{{__('about.text_12')}}</h2>
                                                    <div class="desktop-hide">
                                                        <div class="offices-card">
                                                            <p class="hs-countrie">Montréal, Canada</p>
                                                            <p>5420 Saint-Laurent,
                                                                <br>Suite 300,
                                                                <br>Montréal, QC, H2T 1S1, Canada</p>
                                                            <p>+1 (514) 379-6719</p>
                                                        </div>
                                                        <div class="offices-card">
                                                            <p class="hs-countrie">Paris, France</p>
                                                            <p>14-16 rue des Petits Hotels
                                                                <br>75010 Paris, France</p>
                                                            <p>+33 1 84 67 12 84</p>
                                                        </div>
                                                        <div class="offices-card">
                                                            <p class="hs-countrie">New York, USA</p>
                                                            <p>27 West 20th Street, Suite 800
                                                                <br>New York, NY 10011</p>
                                                            <p></p>
                                                        </div>
                                                        <div class="offices-card">
                                                            <p class="hs-countrie">Geneva, Switzerland</p>
                                                            <p>Rte de St Julien 275
                                                                <br>CH-1258 Perly - Geneva</p>
                                                            <p>+41 22 548 09 19</p>
                                                        </div>
                                                    </div>
                                                    <div class="mobile-hide offices">
                                                        <img src="{{asset('/public/frontend/images/potloc-offices.png')}}" alt="Map" loading="lazy" style="max-width: 100%; height: auto;">
                                                        <div class="offices-city" style="left:26.9%;top:36.3%;">
                                                            <div class="offices-card">
                                                                <p class="countrie">Montréal, Canada</p>
                                                                <p>5420 Saint-Laurent,
                                                                    <br>Suite 300,
                                                                    <br>Montréal, QC, H2T 1S1, Canada</p>
                                                                <p>+1 (514) 379-6719</p>
                                                            </div>
                                                        </div>
                                                        <div class="offices-city" style="left:47.8%;top:34.5%;">
                                                            <div class="offices-card">
                                                                <p class="countrie">Paris, France</p>
                                                                <p>14-16 rue des Petits Hotels
                                                                    <br>75010 Paris, France</p>
                                                                <p>+33 1 84 67 12 84</p>
                                                            </div>
                                                        </div>
                                                        <div class="offices-city" style="left:27%;top:40%;">
                                                            <div class="offices-card">
                                                                <p class="countrie">New York, USA</p>
                                                                <p>27 West 20th Street, Suite 800
                                                                    <br>New York, NY 10011</p>
                                                                <p></p>
                                                            </div>
                                                        </div>
                                                        <div class="offices-city" style="left:49%;top:36%;">
                                                            <div class="offices-card">
                                                                <p class="countrie">Geneva, Switzerland</p>
                                                                <p>Rte de St Julien 275
                                                                    <br>CH-1258 Perly - Geneva</p>
                                                                <p>+41 22 548 09 19</p>
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
                    <div class="row-fluid-wrapper row-depth-1 row-number-11 dnd-section dnd_area-row-5-padding">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-12 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget widget_1613374258107-margin dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613374258107" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <span id="hs_cos_wrapper_widget_1613374258107_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                                    <h6 style="text-align: center; margin: 0;">{{__('about.text_13')}}</h6></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid-wrapper row-depth-1 row-number-13 dnd-row">
                                    <div class="row-fluid ">
                                        <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                            <div id="hs_cos_wrapper_widget_1613374342207" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                <div class="btn-md-wrapper">
                                                    <div class="btn-container center" style="padding-top:0px; padding-bottom:0px;"> <a class="hs-button" href="#">{{__('about.text_14')}}</a>
                                                        {{--															<div class="btn-container center" style="padding-top:px; padding-bottom:px;"> <a class="hs-button" href="https://www.ethicalresearchsolution.com/careers">{{__('about.text_14')}}</a>--}}
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
        </div>
    </div>




@endsection
@push('js')
@endpush
