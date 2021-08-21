@extends('backend.includes.master')

@section('title','Users')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content_title','SYSTEM USERS/MEMBERS')
@section('content_target','All MEMBERS')
@section('contents')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Member List</h6>

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
                                <th class="wd-20p">Role Name</th>
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





@endsection
@section('js')
    <script>


        var defaultUrl = "{{ route('admin.members.getMemberList') }}";
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
                    {data: 'role.display_name'},
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

