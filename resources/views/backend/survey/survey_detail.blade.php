@extends('backend.includes.master')

@section('title','Home')
@section('css')

@endsection
@section('action_buttons')
    <a href="{{url('/admin/survey')}}" target="_blank" type="button" class="btn btn-primary my-2 btn-icon-text" id="add_project">
        <i class="fe fe-briefcase mr-2"></i> ASSIGN EMPLOYEE
    </a>
@endsection
@section('contents')


    <!-- Row -->
    <div class="row square">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <h3 class="h3">{{$survey->name}}</h3>
                    <div class="profile-tab tab-menu-heading">
                        <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100">
                            <a class="nav-link  active" data-toggle="tab" href="#about">Employee Assigned</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card main-content-body-profile">
                <div class="tab-content">
                    <div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
                        <div class="card-body border">
                            <div class="mb-4 main-content-label">Employee Assigned</div>
                            <div class="table-responsive table-condensed table-hover">
                                <table class="table" id="DeviceListTable">
                                    <thead>
                                    <tr>
                                        <th class="wd-20p">Employee Name</th>
                                        <th class="wd-20p">Employee Email</th>
                                        <th class="wd-20p">Employee Telephone</th>
                                        <th class="wd-20p">Status</th>
                                        <th class="wd-20p">Opened Date</th>
                                        <th class="wd-20p">Notification</th>
{{--                                        <th class="wd-25p">Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $historical)
                                        <tr>
                                            <td>{{$historical->user->full_name}}</td>
                                            <td>{{$historical->user->email}}</td>
                                            <td>{{$historical->user->telephone}}</td>
                                            <td>{{$historical->status}}</td>
                                            <td>{{$historical->date}}</td>
                                            @if($historical->sms=='on' && $historical->email=='on')
                                                <td>SMS,EMAIL</td>
                                                @else
                                                @if($historical->sms=='on')
                                                    <td>SMS</td>
                                                @endif
                                                    @if($historical->email=='on')
                                                    <td>SMS,EMAIL</td>
                                                @endif
                                                @endif
{{--                                            <td></td>--}}
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


@endsection

