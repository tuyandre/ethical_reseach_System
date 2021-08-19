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
    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="attach_permission">
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
    <hr style="width:50%;text-align:left;margin-left:0">
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Permission  List Assigned on <span style="color: #34ce57"><strong>{{$role->display_name}}</strong></span> </h6>

                    </div>
                    <div class="table-responsive table-hover">
                        <table class="table" id="PermissionTable">
                            <thead>
                            <tr>
                                <th class="wd-20p">Permission Name</th>
                                <th class="wd-20p">Permission Display Name</th>
                                <th class="wd-20p">Permission Description</th>
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
    <div class="modal" id="attachPermission">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Attach Permission</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages"></div>
                    <form action="{{route('admin.roles.attach_permission')}}" method="post" data-parsley-validate="" id="frmSave">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                               Select Permission:
                                            </div>
                                        </div>

                                        <?php

                                        $permissions=\App\Models\Permission::all();
                                        ?>

                                        <select name="permission" class="form-control select2">
                                            <option value="">Select Permission</option>
                                               @foreach($permissions as $permission)
                                                <option value="{{$permission->id}}">{{$permission->display_name}}</option>
                                                @endforeach
                                        </select>

                                      <input class="form-control" id="role_id" name="role" type="hidden">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnSave">Attach Permission</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"  type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" value="{{ Session::token() }}" id="token">


@endsection
@section('js')
    <script>
        var role_id="{{$role->id}}";
        console.log(role_id);


        var defaultUrl = '{{ route("admin.roles.role_user", ":id") }}';
        defaultUrl = defaultUrl.replace(':id', role_id);

        var defaultUrl_permission = '{{ route("admin.roles.getRolePermission", ":id") }}';
        defaultUrl_permission = defaultUrl_permission.replace(':id', role_id);

        var table;
        var table_permission;
        var manageTable = $("#RoleTable");
        var manageTable_permission = $("#PermissionTable");
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
        function myFunc_permission() {
            table_permission = manageTable_permission.DataTable({
                ajax: {
                    url: defaultUrl_permission,
                    dataSrc: 'permission'
                },
                columns: [
                    {data: 'name'},
                    {data: 'display_name'},
                    {data: 'description'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            var url_remove='{{route("admin.roles.remove_permission")}}';
                            // url_remove=url_remove.replace(':id',row.id);

                            return "<button class='btn btn-warning btn-sm btn-flat js-remove_permission' data-id='" + row.id +
                                "' data-url='" + url_remove + "'> <i class='fa fa-times-circle'></i>Remove</button>";

                        }
                    }
                ]
            });
        }
        $(document).ready(function () {
            //initialize data table
            myFunc();
            myFunc_permission();





            $("#attach_permission").click(function () {
                $("#attachPermission").modal({
                    backdrop: 'static',
                    keyboard: false
                });

                console.log(role_id);
                $("#role_id").val(role_id);


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

                        if (data.role == "ok") {
                            btn.button('reset');
                            form[0].reset();
                            // reload the table
                            table.destroy();
                            table_permission.destroy();
                            myFunc();
                            myFunc_permission();
                            $('#add-messages').html('<div class="alert alert-success flat">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Permission  successfully Attached. </div>');

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


            manageTable_permission.on('click', '.js-remove_permission', function () {
                var permission_id = $(this).attr('data-id');
                // $("#device_name").val(file);
                var button = $(this);
                bootbox.confirm("Are you sure you want to Remove  this Permission?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'post',
                            data: {_token: $('#token').val(),role:role_id,permission:permission_id},
                            success: function (data) {
                                console.log(data);
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Permission Removed successful"
                                });
                                table_permission.rows(tr).remove().draw(false);
                                table_permission.destroy();
                                myFunc_permission();
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Role Not Deleted please try again"
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

