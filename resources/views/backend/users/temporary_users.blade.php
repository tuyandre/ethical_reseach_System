@extends('backend.includes.master')

@section('title','User')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content_title','SYSTEM USERS/MEMBERS')
@section('content_target','All USERS')
@section('action_buttons')
{{--    <button type="button" class="btn btn-info my-2 btn-icon-text" id="user_import">--}}
{{--        <i class="fe fe-upload-cloud mr-2"></i> Import User--}}
{{--    </button>--}}
{{--    <a type="button" href="{{route('admin.users.file-export')}}" target="_blank" class="btn btn-secondary my-2 btn-icon-text" id="user_eport">--}}
{{--        <i class="fe fe-download-cloud mr-2"></i> Export User--}}
{{--    </a>--}}
{{--    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="add_user">--}}
{{--        <i class="fe fe-user-plus mr-2"></i> Add New User--}}
{{--    </button>--}}
@endsection
@section('contents')


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Users List For Un_Role</h6>

                    </div>
                    <div class="table-responsive table-hover">
                        <table class="table" id="UserTable">
                            <thead>
                            <tr>
                                <th class="wd-20p">User Name</th>
                                <th class="wd-20p">User Email</th>
                                <th class="wd-20p">User Phone</th>
                                <th class="wd-20p">Gender</th>
                                <th class="wd-20p">District</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('js')
    <script>
        var defaultUrl = "{{ route('admin.users.getUnRoleUser') }}";
        var table;
        var manageTable = $("#UserTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'users'
                },
                columns: [
                    {data: 'full_name'},
                    {data: 'email'},
                    {data: 'telephone'},
                    {data: 'gender'},
                    {data: 'district1'},
                    {
                        data: 'id',
                        render: function (data, type, row) {

                            var url_activate='{{route("admin.users.activate_user",":id")}}';
                            url_activate=url_activate.replace(':id',row.id);

                            var url_deactivate='{{route("admin.users.deactivate_user",":id")}}';
                            url_deactivate=url_deactivate.replace(':id',row.id);

                            var url_detail='{{route("admin.users.userDetail",":id")}}';
                            url_detail=url_detail.replace(':id',row.id);


                            if (row.activated==1){
                                return "<button class='btn btn-warning btn-sm btn-flat js-deactivate ' data-id='" + row.id +
                                    "' data-url='" + url_deactivate + "'> <i class='fa fa-times-circle'></i>Deactivate</button>"+
                                    "<a href='"+url_detail+"' class='btn btn-info btn-sm btn-flat'><i class='fa fa-eye'></i>View</a>";
                            }else {
                                return "<button class='btn btn-success btn-sm btn-flat js-activate ' data-id='" + row.id +
                                    "' data-url='" + url_activate + "'> <i class='fa fa-check-circle'></i>Activate</button>"+
                                    "<a href='"+url_detail+"' class='btn btn-info btn-sm btn-flat'><i class='fa fa-eye'></i>View</a>";
                            }



                        }
                    }
                ]
            });
        }
        $(document).ready(function () {

            //initialize data table
            myFunc();

            manageTable.on('click', '.js-deactivate', function () {
                var button = $(this);
                bootbox.confirm("Are you sure you want to Deactivate  this User?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'put',
                            data: {_token: $('#token').val()},
                            success: function (data) {
                                console.log(data);
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " User Deactivated successful"
                                });
                                table.rows(tr).remove().draw(false);
                                table.destroy();
                                myFunc();
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " User Not Deactivated please try again"
                                });
                            }
                        });

                    }
                })
            });


            manageTable.on('click', '.js-activate', function () {
                var button = $(this);
                bootbox.confirm("Are you sure you want to Activate  this User?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'put',
                            data: {_token: $('#token').val()},
                            success: function (data) {
                                console.log(data);
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-success'></i>" +
                                        " User Activated successful"
                                });
                                table.rows(tr).remove().draw(false);
                                table.destroy();
                                myFunc();
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " User Not Activated please try again"
                                });
                            }
                        });

                    }
                })
            });

        });



    </script>


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

