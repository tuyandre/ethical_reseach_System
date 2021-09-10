@extends('backend.includes.master')

@section('title','Home')
@section('css')
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
@endsection
@section('content_title','SYSTEM USERS/MEMBERS')
@section('content_target','USERS DETAIL')
@section('action_buttons')
    <button type="button" class="btn btn-secondary my-2 btn-icon-text" id="attach_role">
        <i class="fe fe-shield mr-2"></i> Control Role
    </button>
    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="attach_permission">
        <i class="fe fe-shield mr-2"></i> Assign New Permission
    </button>
@endsection
@section('contents')



    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card main-content-body-profile">
                <div class="tab-content">
                    <div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
                        <div class="card-body p-0 border p-0 rounded-10">

                            <div class="border-top"></div>
                            <div class="p-4">
                                <label class="main-content-label tx-13 mg-b-20">Contact</label>
                                <div class="d-sm-flex row">
                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-primary-transparent text-primary">
                                                    <i class="icon ion-md-phone-portrait"></i> </div>
                                                <div class="media-body"> <span>Full Name</span>
                                                    <div>{{$user->full_name}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-success-transparent text-success"> <i class="icon ion-ios-phone-portrait"></i> </div>
                                                <div class="media-body"> <span>Telephone</span>
                                                    <div>{{$user->telephone}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
                                                <div class="media-body"> <span>Email</span>
                                                    <div> {{$user->email}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
                                                <div class="media-body"> <span>Birth Date</span>
                                                    <div> {{$user->date}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
                                                <div class="media-body"> <span>Country</span>
                                                    <div> {{$user->country}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
                                                <div class="media-body"> <span>Current Address</span>
                                                    <div> {{$user->district1}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
                                                <div class="media-body"> <span>second Address</span>
                                                    <div> {{$user->district2}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
                                                <div class="media-body"> <span>Third Address</span>
                                                    <div> {{$user->district3}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
                                                <div class="media-body"> <span>Gender</span>
                                                    <div> {{$user->gender}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-sm-r-20 mg-b-10 col-md-3"  style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
                                                <div class="media-body"> <span>Education</span>
                                                    <div> {{$user->education}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-sm-r-20 mg-b-10 col-md-3" style="padding-bottom: 10px !important;">
                                        <div class="main-profile-contact-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
                                                <div class="media-body"> <span>Education Field</span>
                                                    <div> {{$user->fields}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>







                                </div>
                            </div>
                            <div class="border-top"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Permission  List Assigned on <span style="color: #34ce57"><strong>{{$user->full_name}}</strong></span> </h6>

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



    <div class="modal" id="attachPermission">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Attach Permission</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages"></div>
                    <form action="{{route('admin.users.attach_permission')}}" method="post" data-parsley-validate="" id="frmSave">
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

                                        <input class="form-control" id="user_id" name="user" type="hidden">
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

    <div class="modal" id="attachRole">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Assign/Remove Role</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages2"></div>
                    <form action="{{route('admin.users.controlRole')}}" method="post" data-parsley-validate="" id="frmSaveRole">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="row row-sm form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Select Role:
                                            </div>
                                        </div>

                                        <?php

                                        $roles=\App\Models\Role::all();
                                        ?>

                                        <select name="role" class="form-control select2">
                                            <option value="">Select Role</option>
                                            <option value="0">Remove Current Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                                            @endforeach
                                        </select>

                                        <input class="form-control" id="user_id2" name="user" type="hidden">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnSave2">SAVE</button>
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
    var user_id="{{$user->id}}";
    var defaultUrl_permission = '{{ route("admin.users.getUserPermission", ":id") }}';
    defaultUrl_permission = defaultUrl_permission.replace(':id', user_id);
    var table_permission;
    var manageTable_permission = $("#PermissionTable");

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
                        var url_remove='{{route("admin.users.remove_permission")}}';
                        // url_remove=url_remove.replace(':id',row.id);

                        return "<button class='btn btn-warning btn-sm btn-flat js-remove_permission' data-id='" + row.id +
                            "' data-url='" + url_remove + "'> <i class='fa fa-times-circle'></i>Remove</button>";

                    }
                }
            ]
        });
    }
    $(document).ready(function () {
        myFunc_permission();


        $("#attach_role").click(function () {
            $("#attachRole").modal({
                backdrop: 'static',
                keyboard: false
            });
            console.log(user_id);
            $("#user_id2").val(user_id);

            $('#frmSaveRole').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var btn = $('#btnSave2');
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
                        table_permission.destroy();
                        myFunc_permission();
                        $('#add-messages2').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Role  successfully Attached. </div>');

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
                    $('#add-messages2').html('<div class="alert alert-danger flat">' +
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


        $("#attach_permission").click(function () {
            $("#attachPermission").modal({
                backdrop: 'static',
                keyboard: false
            });




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

                    if (data.user == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        // reload the table
                        table_permission.destroy();
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
                        data: {_token: $('#token').val(),user:user_id,permission:permission_id},
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

