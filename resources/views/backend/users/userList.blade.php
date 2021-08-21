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
    <button type="button" class="btn btn-primary my-2 btn-icon-text" id="add_user">
        <i class="fe fe-user-plus mr-2"></i> Add New User
    </button>
@endsection
@section('contents')


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Users List</h6>

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

    <!-- Basic modal -->
    <div class="modal" id="addUser">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add User</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="add-messages"></div>
                    <form action="{{route('admin.users.save_user')}}" method="post" data-parsley-validate="" id="frmSave">
                        {{ csrf_field() }}
                        <div class="">

                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                First Name:
                                            </div>
                                        </div><input class="form-control" id="textMask" name="first_name" placeholder="First Name" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Last Name:
                                            </div>
                                        </div><input class="form-control" id="textMask" name="last_name" placeholder="Last Name" type="text" required>
                                    </div>
                                </div>

                            </div>


                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Role Name:
                                            </div>
                                        </div>
                                        <?php

                                        $permissions=\App\Models\Role::all();
                                        ?>

                                        <select name="role" class="form-control select2">
                                            <option value="">Select Role</option>
                                            @foreach($permissions as $permission)
                                                <option value="{{$permission->id}}">{{$permission->display_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                User Email:
                                            </div>
                                        </div><input class="form-control" name="email" required id="mask" placeholder="Email"type="email">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                User Phone:
                                            </div>
                                        </div><input class="form-control" name="phone" required id="mask" placeholder="Email"type="tel">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                               Birth Date:
                                            </div>
                                        </div><input class="form-control" name="date" required id="date" placeholder="Birth Date"type="date">
                                    </div>
                                </div>

                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Country:
                                            </div>
                                        </div><input class="form-control" name="country"  id="country" placeholder="Country" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Current District:
                                            </div>
                                        </div><input class="form-control" name="district1" required id="district1" placeholder="Current District" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Possible District:
                                            </div>
                                        </div><input class="form-control" name="district2"  id="district2" placeholder="Possible District" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Possible District:
                                            </div>
                                        </div><input class="form-control" name="district3" required id="district3" placeholder="Possible District" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Education Level:
                                            </div>
                                        </div>
                                        <select name="education" class="form-control select2">
                                            <option value="">Select Education</option>
                                                <option value="Masters">Masters</option>
                                                <option value="Bachelor">Bachelors</option>
                                                <option value="Advanced Diploma">Advanced Diploma</option>
                                                <option value="Secondary">Secondary certificate</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Education Field:
                                            </div>
                                        </div><input class="form-control" name="fields" required id="fields" placeholder="Education Fields" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-sm form-group">
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                User Gender:
                                            </div>
                                        </div>
                                        <select name="gender" class="form-control select2">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                User Password:
                                            </div>
                                        </div><input class="form-control" name="password" required id="password" placeholder="******" type="password">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" id="btnSave">Add User</button>
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
        var defaultUrl = "{{ route('admin.users.getUserList') }}";
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
            $("#add_user").click(function () {
                $("#addUser").modal({
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

                    if (data.user == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        // reload the table
                        table.destroy();
                        myFunc();
                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> User  successfully Registered. </div>');

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

