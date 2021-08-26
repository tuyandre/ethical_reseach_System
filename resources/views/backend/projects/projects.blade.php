@extends('backend.includes.master')

@section('title','Home')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content_title','SYSTEM PROJECTS')
@section('content_target','All PROJECT LIST')
@section('action_buttons')
    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="add_project">
        <i class="fe fe-briefcase mr-2"></i> Add New PROJECTS
    </button>
@endsection
@section('contents')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Projects List</h6>

                    </div>
                    <div class="table-responsive table-hover">
                        <table class="table" id="ProjectTable">
                            <thead>
                            <tr>
                                <th class="wd-20p">Project Name</th>
                                <th class="wd-20p">Project Size</th>
                                <th class="wd-20p">Client Name</th>
                                <th class="wd-20p">Client Email</th>
                                <th class="wd-25p">Budget</th>
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


    <!-- Basic modal -->
    <div class="modal" id="addProject">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add Project</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages"></div>
                    <form action="{{route('admin.projects.saveProject')}}" method="post" data-parsley-validate="" id="frmSave">
                        {{ csrf_field() }}
                        <div class="">

                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Project Name:
                                            </div>
                                        </div><input class="form-control" id="textMask" name="project_name" placeholder="Project Name" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Project Code:
                                            </div>
                                        </div><input class="form-control" id="textMask" name="project_code" placeholder="Project Code" type="text" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Project Sample Size:
                                            </div>
                                        </div>
                                        <select name="sample_size" class="form-control select2">
                                            <option value="">Select Sample Size</option>
                                                <option value="Small Project">Small Project</option>
                                                <option value="Medium Project">Medium Project</option>
                                                <option value="Large Project">Large Project</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row row-sm form-group">

                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Client Name:
                                            </div>
                                        </div><input class="form-control" name="client_name" required id="mask" placeholder="Client Name"type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Client Email:
                                            </div>
                                        </div><input class="form-control" name="client_email" required id="mask" placeholder="Client Email"type="email">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Project Objective:
                                            </div>
                                        </div>
                                        <textarea rows="5" class="form-control" name="objective" required id="mask" placeholder="Project Objective"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Project Description:
                                            </div>
                                        </div>
                                        <textarea class="form-control" rows="5" name="description" required id="description" placeholder="Project Description"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Project Budget:
                                            </div>
                                        </div>
                                        <input class="form-control" name="budget"  id="budget" placeholder="Project Budget" type="number">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Project Size:
                                            </div>
                                        </div><input class="form-control" name="size" required id="size" placeholder="Size" type="number">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnSave">Add Project</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"  type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')

    <script>
        var defaultUrl = "{{ route('admin.projects.getProjectList') }}";
        var table;
        var manageTable = $("#ProjectTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'projects'
                },
                columns: [
                    {data: 'project_name'},
                    {data: 'sample_size'},
                    {data: 'client_name'},
                    {data: 'client_email'},
                    {data: 'budget'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            var url_more = '{{ route("admin.devices.deviceDetail", ":id") }}';
                            url_more = url_more.replace(':id', row.id);
                            var url_show='{{route("admin.devices.showDevice",":id")}}';
                            url_show=url_show.replace(':id',row.id);

                                return"<a  href='"+url_more+"' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                    "' > <i class='fa fa-eye'></i>View</a>" +
                                    "<button class='btn btn-secondary btn-sm btn-flat js-edit ' data-id='" + row.id +
                                    "' data-url='" + url_show + "'> <i class='fa fa-pen'></i>Edit</button>";

                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            $("#add_project").click(function () {
                $("#addProject").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
            //initialize data table
            myFunc();

            $('#frmSave').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var btn = $('#btnSave');
                btn.button('loading');
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize()
                }).done(function (data) {
                    console.log(data);

                    if (data.project == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        // reload the table
                        table.destroy();
                        myFunc();
                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Project  successfully Registered. </div>');

                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        });
                        location.reload();
                    }
                }).fail(function (response) {
                    console.log(response.responseJSON);

                    btn.button('reset');
//                    showing errors validation on pages

                    var option = "";
                    option += response.responseJSON.message;
                    var data = response.responseJSON.errors;
                    $.each(data, function (i, value) {
                        console.log(value);
                        if (i == 'name') {
                            $('#tname').html(value[0])
                        }
                        $.each(value, function (j, values) {
                            option += '<p>' + values + '</p>';
                        });
                    });
                    $('#add-messages').html('<div class="alert alert-danger flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-remove"></i></strong><b>oops:</b>' + option + '</div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });

                    //alert("Internal server error");
                });
                return false;
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

