@extends('backend.includes.master')

@section('title','Home')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content_title','SYSTEM PROJECTS')
@section('content_target','All PROJECT FILES LIST')
@section('action_buttons')
    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="add_project">
        <i class="fe fe-briefcase mr-2"></i> Add New Files
    </button>
@endsection
@section('contents')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Projects File List</h6>

                    </div>
                    <div class="table-responsive table-hover">
                        <table class="table" id="FileTable">
                            <thead>
                            <tr>
                                <th class="wd-20p">Project Name</th>
                                <th class="wd-20p">Client Name</th>
                                <th class="wd-20p">File Title</th>
                                <th class="wd-25p">FileName</th>
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
        var defaultUrl = "{{ route('admin.files.getFileList') }}";
        var table;
        var manageTable = $("#FileTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'files'
                },
                columns: [
                    {data: 'project.project_name'},
                    {data: 'project.client_name'},
                    {data: 'file_title'},
                    {data: 'filename'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            var url_more = '{{ route("admin.devices.deviceDetail", ":id") }}';
                            url_more = url_more.replace(':id', row.id);
                            var url_show='{{route("admin.devices.showDevice",":id")}}';
                            url_show=url_show.replace(':id',row.id);
                            var url_release='{{route("admin.devices.releaseDevice",":id")}}';
                            url_release=url_release.replace(':id',row.id);
                            if(data==1){

                                return"<a  href='"+url_more+"' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                    "' > <i class='fa fa-eye'></i>View</a>" +
                                    "<button class='btn btn-primary btn-sm btn-flat js-assign ' data-id='" + row.id +
                                    "' data-url='" + url_show + "'> <i class='fa fa-send'></i>Assign</button>" +
                                    "<button class='btn btn-secondary btn-sm btn-flat js-edit ' data-id='" + row.id +
                                    "' data-url='" + url_show + "'> <i class='fa fa-pen'></i>Edit</button>";
                            }else {
                                return "<a  href='"+url_more+"' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + row.id +
                                    "' > <i class='fa fa-eye'></i>View</a>" +
                                    "<button class='btn btn-success btn-sm btn-flat js-confirm' data-id='" + data +
                                    "' data-url='" + url_release + "'> <i class='fa fa-check'></i>Release</button>";
                            }

                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            $("#add_devices").click(function () {
                $("#addDevice").modal({
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

