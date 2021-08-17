@extends('backend.includes.master')

@section('title','ROLE')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content_title','SYSTEM PRIVILEGE')
@section('content_target','All ROLES')
@section('action_buttons')
    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="add_role">
        <i class="fe fe-user-plus mr-2"></i> Add New Role
    </button>
@endsection
@section('contents')


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Roles List</h6>

                    </div>
                    <div class="table-responsive table-hover">
                        <table class="table" id="RoleTable">
                            <thead>
                            <tr>
                                <th class="wd-20p">Role Name</th>
                                <th class="wd-20p">Display Name</th>
                                <th class="wd-20p">Role Description</th>
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
    <div class="modal" id="addRole">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add Role</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages"></div>
                    <form action="{{route('admin.roles.saveRole')}}" method="post" data-parsley-validate="" id="frmSave">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Role Name:
                                            </div>
                                        </div>

                                        <input class="form-control" id="textMask" name="name" placeholder="Role name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Display Name:
                                            </div>
                                        </div><input class="form-control" id="textMask" name="display_name" placeholder="Display Name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                               Role Description:
                                            </div>
                                        </div><input class="form-control" name="description" required id="mask" placeholder="Role Description"type="text">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnSave">Save Role</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"  type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Basic modal -->
    <div class="modal" id="updateRole">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Update Role</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="edit-messages"></div>
                    <form action="{{route('admin.roles.updateRoles')}}" method="post" data-parsley-validate="" id="frmUpdate">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Role Name:
                                            </div>
                                        </div>

                                        <input class="form-control" id="edit_name" name="role_name" placeholder="Role name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Display Name:
                                            </div>
                                        </div><input class="form-control" id="edit_display" name="display_name" placeholder="Display Name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Role Description:
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" id="id"/>
                                        <input class="form-control" name="description" required id="edit_description" placeholder="Role Description"type="text">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnUpdate">Update Role</button>
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
        var defaultUrl = "{{ route('admin.roles.getRoles') }}";
        var table;
        var manageTable = $("#RoleTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'roles'
                },
                columns: [
                    {data: 'name'},
                    {data: 'display_name'},
                    {data: 'description'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            var url_show = '{{ route("admin.roles.showRoles", ":id") }}';
                            url_show = url_show.replace(':id', row.id);

                            var url_delete='{{route("admin.roles.deleteRoles",":id")}}';
                            url_delete=url_delete.replace(':id',row.id);

                            var url_detail='{{route("admin.roles.roleDetail",":id")}}';
                            url_detail=url_detail.replace(':id',row.id);

                            return "<button class='btn btn-primary btn-sm btn-flat js-edit' data-id='" + row.id +
                                "' data-url='" + url_show + "'> <i class='fa fa-pen'></i>Edit</button>" +
                                "<button class='btn btn-secondary btn-sm btn-flat js-delete ' data-id='" + row.id +
                                "' data-url='" + url_delete + "'> <i class='fa fa-trash'></i>Delete</button>"+
                                "<a href='"+url_detail+"' class='btn btn-success btn-sm btn-flat'><i class='fa fa-eye'></i>View</a>";

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
                        myFunc();
                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Role  successfully Registered. </div>');

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

            //forward file to the client
            manageTable.on('click', '.js-edit', function () {
                $("#updateRole").modal({
                    backdrop: 'static',
                    keyboard: false
                });

                var url = $(this).attr('data-url');
                var id = $(this).attr('data-id');
                console.log(url);

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {id: id},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);

                        // setting values returned
                        $("#edit_name").val(response.role.name);
                        $("#edit_display").val(response.role.display_name);
                        $("#edit_description").val(response.role.description);

                        // add hidden id
                        $('#id').val(response.role.id);
                        // update - form
                        $('#frmUpdate').unbind('submit').bind('submit', function (e) {
                            e.preventDefault();
                            var form = $(this);
                            form.parsley().validate();
                            if (!form.parsley().isValid()) {
                                return false;
                            }
                            // edit btn
                            $('#btnUpdate').button('loading');

                            $.ajax({
                                url: form.attr('action'),
                                type: 'POST',
                                data: form.serialize()
                            }).done(function (response) {
                                // submit btn
                                $('#btnUpdate').button('reset');
//                                form[0].reset();
                                // reload the table
                                table.destroy();
                                myFunc();
                                // remove the error text
                                $(".text-danger").remove();
                                // remove the form error
                                $('#edit-messages').html('<div class="alert alert-success">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Role  successfully updated. </div>');

                                $(".alert-success").delay(500).show(10, function () {
                                    $(this).delay(3000).hide(10, function () {
                                        $(this).remove();
                                    });
                                }); // /.alert

                                location.reload();
                            }).fail(function (response) {
                                console.log(response);
                                $('#editBtn').button('reset');
                                var errors = "";
                                errors+="<b>"+response.responseJSON.message+"</b>";
                                var data=response.responseJSON.errors;

                                $.each(data,function (i, value) {
                                    console.log(value);
                                    if (i=='name'){
                                        $('#ename').html(value[0])
                                    }
                                    $.each(value,function (j, values) {
                                        errors += '<p>' + values + '</p>';
                                    });
                                });
                                $('#edit-messages').html('<div class="alert alert-danger flat">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-glyphicon-remove"></i></strong><b>oops:</b>'+errors+'</div>');

                                $(".alert-success").delay(500).show(10, function () {
                                    $(this).delay(3000).hide(10, function () {
                                        $(this).remove();
                                    });
                                });
                            });	 // /ajax

                            return false;
                        }); // /update - form

                    } // /success
                }); // ajax function


















                var file = $(this).attr('data-id');
                $("#device_name").val(file);
                $('#assignFrmSave').submit(function (e) {
                    e.preventDefault();
                    var form = $(this);
                    var btn = $('#btnSave2');
                    btn.attr("disabled", true);
                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: new FormData(this),
                        dataType: "JSON",
                        contentType: false,
                        cashe: false,
                        processData: false,
                    }).done(function (data) {
                        console.log(data);

                        if (data.device == "ok") {
                            form[0].reset();
                            // reload the table
                            table.destroy();
                            myFunc();
                            $('#add-messages1').html('<div class="alert alert-success flat">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Device  successfully Assigned. </div>');

                            $(".alert-success").delay(1000).show(10, function () {
                                $(this).delay(1000).hide(10, function () {
                                    $(this).remove();
                                });
                            });
                            btn.attr("disabled", false);
                            location.reload();

                        }
                    }).fail(function (response) {
                        console.log(response.responseJSON);

                        btn.attr("disabled", false);
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
                        $('#add-messages1').html('<div class="alert alert-danger flat">' +
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


            manageTable.on('click', '.js-delete', function () {
                var button = $(this);
                bootbox.confirm("Are you sure you want to Delete  this Role?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'delete',
                            data: {_token: $('#token').val()},
                            success: function (data) {
                                console.log(data);
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Role Deleted successful"
                                });
                                table.rows(tr).remove().draw(false);
                                table.destroy();
                                myFunc();
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

