@extends('backend.includes.master')

@section('title','Home')
@section('css')
    <!-- Internal DataTables css-->
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content_title','SYSTEM DEVICES')
@section('content_target','AVAILABLE DEVICES')
@section('contents')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Available Devices List</h6>

                    </div>
                    <div class="table-responsive table-hover">
                        <table class="table" id="DeviceListTable">
                            <thead>
                            <tr>
                                <th class="wd-20p">Device Name</th>
                                <th class="wd-20p">Device Brand</th>
                                <th class="wd-20p">Device Model</th>
                                <th class="wd-20p">Device S/N</th>
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

    <input type="hidden" value="{{ Session::token() }}" id="token">




@endsection
@section('js')

    <script>
        var defaultUrl = "{{ route('admin.devices.getAvailableDevices') }}";
        var table;
        var manageTable = $("#DeviceListTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'devices'
                },
                columns: [
                    {data: 'device_name'},
                    {data: 'device_brand'},
                    {data: 'device_model'},
                    {data: 'device_serialNo'},
                    {
                        data: 'status',
                        render: function (data, type, row) {

                            var url_more = '{{ route("admin.devices.deviceDetail", ":id") }}';
                            url_more = url_more.replace(':id', row.id);

                            var url_show='{{route("admin.devices.showDevice",":id")}}';
                            url_show=url_show.replace(':id',row.id);

                                return"<a  href='"+url_more+"' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                    "' > <i class='fa fa-eye'></i>View</a>" +
                                    "<button class='btn btn-primary btn-sm btn-flat js-assign ' data-id='" + row.id +
                                    "' data-url='" + url_show + "'> <i class='fa fa-send'></i>Assign</button>";

                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            //initialize data table
            myFunc();
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

