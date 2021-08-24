@extends('backend.includes.master')

@section('title','Home')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content_title','SYSTEM DEVICES')
@section('content_target','DEVICES DETAIL')
{{--@section('action_buttons')--}}
{{--    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="add_devices">--}}
{{--        <i class="fe fe-user-plus mr-2"></i> Add New Devices--}}
{{--    </button>--}}
{{--@endsection--}}
@section('contents')


    <!-- Row -->
    <div class="row square">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <h3 class="h3">{{$info->device_name}}</h3>
                    <div class="profile-tab tab-menu-heading">
                        <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100">
                            <a class="nav-link  active" data-toggle="tab" href="#about">Detail</a>
                            <a class="nav-link" data-toggle="tab" href="#edit">Historical</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card main-content-body-profile">
                <div class="tab-content">
                    <div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
                        <div class="card-body p-0 border p-0 rounded-10">

                            <div class="border-top"></div>
                            <div class="p-4">
                                <label class="main-content-label tx-13 mg-b-20">DEVICE INFORMATION</label>
                                <div class="d-sm-flex row">
                                    <div class="mg-sm-r-20 mg-b-10 col-md-3"  style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-primary-transparent text-primary">
                                                </div>
                                                <div class="media-body"> <span>Device Name</span>
                                                    <div>{{$info->device_name}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-sm-r-20 mg-b-10 col-md-3"  style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-success-transparent text-success">
                                                </div>
                                                <div class="media-body"> <span>Device Brand</span>
                                                    <div>{{$info->device_brand}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-sm-r-20 mg-b-10 col-md-3"  style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info">
                                                </div>
                                                <div class="media-body"> <span>Device Model</span>
                                                    <div> {{$info->device_model}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mg-sm-r-20 mg-b-10 col-md-3"  style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info">
                                                </div>
                                                <div class="media-body"> <span>Device Serial Number</span>
                                                    <div> {{$info->device_model}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mg-sm-r-20 mg-b-10 col-md-3"  style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info">
                                                </div>
                                                <div class="media-body"> <span>Device IMEI ONE</span>
                                                    <div> {{$info->device_imei1}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mg-sm-r-20 mg-b-10 col-md-3"  style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info">
                                                </div>
                                                <div class="media-body"> <span>Device IMEI TWO</span>
                                                    <div> {{$info->device_imei2}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="border-top"></div>

                        </div>
                    </div>
                    <div class="main-content-body tab-pane p-4 border-top-0" id="edit">
                        <div class="card-body border">
                            <div class="mb-4 main-content-label">Device Historical</div>
                            <div class="table-responsive table-condensed table-hover">
                                <table class="table" id="DeviceListTable">
                                    <thead>
                                    <tr>
                                        <th class="wd-20p">Device Name</th>
{{--                                        <th class="wd-20p">Device Model</th>--}}
                                        <th class="wd-20p">Device S/N</th>
                                        <th class="wd-20p">Member</th>
                                        <th class="wd-20p">Received Date</th>
                                        <th class="wd-25p">Returned Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($historicals as $historical)
                                        <tr>
                                            <td>{{$historical->device->device_name}}</td>
{{--                                            <td>{{$historical->device->device_model}}</td>--}}
                                            <td>{{$historical->device->device_serialNo}}</td>
                                            <td>{{$historical->user->full_name}}</td>
                                            <td>{{$historical->received_date}}</td>
                                            <td>{{$historical->returned_date}}</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')




    <!-- Internal Data Table js -->
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('/public/dashboard/assets/js/table-data.js')}}"></script>
@endsection
