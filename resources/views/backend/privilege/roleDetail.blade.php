@extends('backend.includes.master')

@section('title','ROLE DETAIL')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content_title','SYSTEM PRIVILEGE')
@section('content_target','ROLE DETAIL')
@section('action_buttons')
    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="add_role">
        <i class="fe fe-send mr-2"></i> ASSIGN PERMISSION
    </button>
@endsection
@section('contents')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">User  List Assigned on <span style="color: #34ce57"><strong>{{$role->display_name}}</strong></span> </h6>

                    </div>
                    <div class="table-responsive table-hover">
                        <table class="table" id="RoleTable">
                            <thead>
                            <tr>
                                <th class="wd-20p">User Full Name</th>
                                <th class="wd-20p">User phone</th>
                                <th class="wd-20p">User Email</th>
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
        var role_id="{{$role->id}}";
        console.log(role_id);


        var defaultUrl = '{{ route("admin.roles.role_user", ":id") }}';
        defaultUrl = defaultUrl.replace(':id', role_id);

        var table;
        var manageTable = $("#RoleTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'user'
                },
                columns: [
                    {data: 'full_name'},
                    {data: 'telephone'},
                    {data: 'email'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            var url_remove='{{route("admin.roles.deleteRoles",":id")}}';
                            url_remove=url_remove.replace(':id',row.id);

                            return "<button class='btn btn-warning btn-sm btn-flat js-edit' data-id='" + row.id +
                                "' data-url='" + url_remove + "'> <i class='fa fa-times-circle'></i>Remove</button>";

                        }
                    }
                ]
            });
        }
        $(document).ready(function () {
            $("#add_role").click(function () {
                $("#addRole").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
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

