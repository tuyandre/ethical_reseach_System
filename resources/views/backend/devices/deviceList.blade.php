@extends('backend.includes.master')

@section('title','Home')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content_title','SYSTEM DEVICES')
@section('content_target','All DEVICES')
@section('action_buttons')
    <button type="button" class="btn btn-info my-2 btn-icon-text" id="device_import">
        <i class="fe fe-upload-cloud mr-2"></i> Import Device
    </button>
    <a type="button" href="{{route('admin.devices.file-export')}}" target="_blank" class="btn btn-secondary my-2 btn-icon-text" id="user_eport">
        <i class="fe fe-download-cloud mr-2"></i> Export Device
    </a>
    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="add_devices">
        <i class="fe fe-user-plus mr-2"></i> Add New Devices
    </button>
@endsection
@section('contents')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Devices List</h6>

                    </div>
                    <div class="table-responsive table-hover">
                        <table class="table" id="DeviceTable">
                            <thead>
                            <tr>
                                <th class="wd-20p">Device Name</th>
                                <th class="wd-20p">Device Model</th>
                                <th class="wd-20p">Device S/N</th>
                                <th class="wd-25p">Status</th>
                                <th class="wd-20p">Member</th>
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
    <div class="modal" id="addDevice">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add Device</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages"></div>
                    <form action="{{route('admin.devices.saveDevices')}}" method="post" data-parsley-validate="" id="frmSave">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device Name:
                                            </div>
                                        </div>

                                        <input class="form-control" id="textMask" name="device_name" placeholder="Device name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device Brand:
                                            </div>
                                        </div><input class="form-control" id="textMask" name="device_brand" placeholder="Device Brand" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device Model:
                                            </div>
                                        </div><input class="form-control" name="device_model" required id="mask" placeholder="Device Model" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Devicen S/N:
                                            </div>
                                        </div><input class="form-control" name="device_serialNo" required id="emailMask" placeholder="Device Serial Number" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device IMEI 1:
                                            </div>
                                        </div>
                                        <input class="form-control" id="passwordMask" placeholder="IMEI ONE" type="number" required name="imei1">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device IMEI 2:
                                            </div>
                                        </div><input class="form-control" id="imei2" placeholder="IMEI TWO " type="number" name="imei2">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnSave">Save Device</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"  type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Basic modal -->


    <!-- Basic modal -->
    <div class="modal" id="updateDevice">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Edit Device</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="edit-messages"></div>
                    <form action="{{route('admin.devices.updateDevices')}}" method="post" data-parsley-validate="" id="frmUpdate">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device Name:
                                            </div>
                                        </div>

                                        <input class="form-control" id="edit_name" name="device_name" placeholder="Device name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device Brand:
                                            </div>
                                        </div><input class="form-control" id="edit_brand" name="device_brand" placeholder="Device Brand" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device Model:
                                            </div>
                                        </div><input class="form-control" name="device_model" required id="edit_model" placeholder="Device Model" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Devicen S/N:
                                            </div>
                                        </div><input class="form-control" name="device_serialNo" required id="edit_seriono" placeholder="Device Serial Number" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device IMEI 1:
                                            </div>
                                        </div>
                                        <input class="form-control" id="edit_imei1" placeholder="IMEI ONE" type="number" required name="imei1">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Device IMEI 2:
                                            </div>
                                        </div>
                                        <input class="form-control" id="edit_imei2" placeholder="IMEI TWO " type="number" name="imei2">
                                        <input class="form-control" id="device_id"  type="hidden" name="device_id">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnUpdate">Update Device</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"  type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Basic modal -->


    <!-- Assign Device modal -->
    <div class="modal" id="assignDevice">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Assign Device</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages1"></div>
                    <form action="{{route('admin.devices.assignDevices')}}" method="post" data-parsley-validate="" id="assignFrmSave">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Select Employee:
                                            </div>
                                        </div>
                                        <?php

                                        $roles=\App\Models\User::with(['Role'])
                                            ->whereHas(
                                                'roles', function($q){
                                                $q->where('name', 'supervisor');
                                                $q->orWhere('name', 'admin');
                                                $q->orWhere('name', 'enumerator');
                                                $q->orWhere('name', 'moderator');
                                                $q->orWhere('name', 'project_manager');
                                                $q->orWhere('name', 'senior_manager');
                                                $q->orWhere('name', 'manager');
                                            }
                                            )->get();
                                        ?>

                                        <select name="member" class="form-control select2">
                                            <option value="">Select Member</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->first_name}} {{$role->last_name}}</option>
                                            @endforeach
                                        </select>
                                        <input class="form-control" id="device_name" name="device_name" type="hidden" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnSave2">Assign Device</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"  type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Basic modal -->

    <!-- Basic modal -->
    <div class="modal" id="DevicesImport">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Devices Import</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages"></div>
                    <form action="{{route('admin.devices.file-import')}}" method="post" data-parsley-validate="" id="frmUpload" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Select File:
                                            </div>
                                        </div>

                                        <input class="form-control" id="textMask" name="file_upload" placeholder="Select File" type="file" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnUpload">Upload Devices</button>
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
        var defaultUrl = "{{ route('admin.devices.getMemberList') }}";
        var table;
        var manageTable = $("#DeviceTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'devices'
                },
                columns: [
                    {data: 'device_name'},
                    {data: 'device_model'},
                    {data: 'device_serialNo'},
                    {data: 'status',
                        render: function (data, type, row) {
                            if(row.status==1){
                                return "<span class='bg-success'> Available</span>";
                            }else {
                                return "<span class='bg-warning'>Not  Available</span>";
                            }

                        }},
                    {data: 'user_id',
                        render: function (data, type, row) {

                            if (data !=null){
                                return "<span>"+row.user.full_name+"</span>";
                            }else{
                                return "";
                            }
                        }

                    },
                    {
                        data: 'status',
                        render: function (data, type, row) {
                            var url_more = '{{ route("admin.devices.deviceDetail", ":id") }}';
                            url_more = url_more.replace(':id', row.id);
                            var url_show='{{route("admin.devices.showDevice",":id")}}';
                            url_show=url_show.replace(':id',row.id);

                            var url_release='{{route("admin.devices.releaseDevice",":id")}}';
                            url_release=url_release.replace(':id',row.id);

                            var url_delete='{{route("admin.devices.destroyDevice",":id")}}';
                            url_delete=url_delete.replace(':id',row.id);

                            if(data==1){

                                return"<a  href='"+url_more+"' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                    "' > <i class='fa fa-eye'></i>View</a>" +
                                    "<button class='btn btn-primary btn-sm btn-flat js-assign ' data-id='" + row.id +
                                    "' data-url='" + url_show + "'> <i class='fa fa-send'></i>Assign</button>" +
                                    "<button class='btn btn-secondary btn-sm btn-flat js-edit ' data-id='" + row.id +
                                    "' data-url='" + url_show + "'> <i class='fa fa-pen'></i>Edit</button>"+
                                    "<button class='btn btn-danger btn-sm btn-flat js-delete' data-id='" + data +
                                    "' data-url='" + url_delete + "'> <i class='fa fa-trash'></i>Delete</button>";
                            }else {
                                return "<a  href='"+url_more+"' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + row.id +
                                    "' > <i class='fa fa-eye'></i>View</a>" +
                                    "<button class='btn btn-success btn-sm btn-flat js-confirm' data-id='" + data +
                                    "' data-url='" + url_release + "'> <i class='fa fa-check'></i>Release</button>" +
                                    "<button class='btn btn-danger btn-sm btn-flat js-delete' data-id='" + data +
                                    "' data-url='" + url_delete + "'> <i class='fa fa-trash'></i>Delete</button>";
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
            $("#device_import").click(function () {
                $("#DevicesImport").modal({
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

                    if (data.device == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        // reload the table
                        table.destroy();
                        myFunc();
                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Device  successfully Registered. </div>');

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
                $("#updateDevice").modal({
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
                        $("#edit_name").val(response.device.device_name);
                        $("#edit_brand").val(response.device.device_brand);
                        $("#edit_model").val(response.device.device_model);
                        $("#edit_seriono").val(response.device.device_serialNo);
                        $("#edit_imei1").val(response.device.device_imei1);
                        $("#edit_imei2").val(response.device.device_imei2);

                        // add hidden id
                        $('#device_id').val(response.device.id);
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
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Device  successfully updated. </div>');

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
                                errors += "<b>" + response.responseJSON.message + "</b>";
                                var data = response.responseJSON.errors;

                                $.each(data, function (i, value) {
                                    console.log(value);
                                    if (i == 'name') {
                                        $('#ename').html(value[0])
                                    }
                                    $.each(value, function (j, values) {
                                        errors += '<p>' + values + '</p>';
                                    });
                                });
                                $('#edit-messages').html('<div class="alert alert-danger flat">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-glyphicon-remove"></i></strong><b>oops:</b>' + errors + '</div>');

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
            });



                //forward file to the client
            manageTable.on('click', '.js-assign', function () {
                $("#assignDevice").modal({
                    backdrop: 'static',
                    keyboard: false
                });
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


            manageTable.on('click', '.js-confirm', function () {
                var button = $(this);
                bootbox.confirm("Are you sure you want to Return  this Device?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'post',
                            data: {_token: $('#token').val()},
                            success: function (data) {
                                console.log(data);
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Device Released successful"
                                });
                                table.rows(tr).remove().draw(false);
                                table.destroy();
                                myFunc();
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Device Not Released please try again"
                                });
                            }
                        });

                    }
                })
            });

            manageTable.on('click', '.js-delete', function () {
                var button = $(this);
                bootbox.confirm("Are you sure you want to Delete  this Device?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'post',
                            data: {_token: $('#token').val()},
                            success: function (data) {
                                console.log(data);
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Device Delete successful"
                                });
                                table.rows(tr).remove().draw(false);
                                table.destroy();
                                myFunc();
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Device Not Deleted ,Because it has Historical Data"
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

