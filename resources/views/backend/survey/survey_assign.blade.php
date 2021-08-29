@extends('backend.includes.master')

@section('title','Home')
@section('css')
    <!-- Internal DataTables css-->
    <link href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('contents')


    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="table-responsive table-hover">
                        <div id="add-messages"></div>
                        <div class="main-content-body tab-pane p-4 border-top-0" id="settings">
                            <form class="form-horizontal" data-select2-id="11" id="send-form" method="post" action="{{route('admin.surveys.sendSurvey')}}">
                                {{ csrf_field() }}
                                <table id="surveyMemberTable" class="table table-striped table-bordered " style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <hr>
                                <div class="form-group " data-select2-id="108">
                                    <div class="row" data-select2-id="107">
                                        <div class="col-md-3">
                                            <label class="form-label">Assign Survey</label>
                                        </div>
                                        <div class="col-md-4" data-select2-id="106">
                                            <select required name="survey_id" id="add-survey" class="form-control">
                                                <option value="">Select Survey</option>

                                                <?php $surveys=\AidynMakhataev\LaravelSurveyJs\app\Models\Survey::all(); ?>
                                                @foreach($surveys as $survey)
                                                    <option value="{{ $survey->id }}">{{ $survey->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3 col">
                                            <label class="form-label">Notification Method(Optional)</label>
                                        </div>
                                        <div class="col-md-9 col">
                                            <label class="ckbox mg-b-10-f">
                                                <input name="email" type="checkbox"><span>Email</span>
                                            </label>
                                            <label class="ckbox mg-b-10-f">
                                                <input name="sms" type="checkbox"><span>SMS</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9">
                                            <div class="mt-3">
                                                <input type="submit" class="btn btn-primary mr-1" id="btnSave" data-loading-text="Loading..." value="Assign Survey"/>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
<script>
    var defaultUrl = "{{ route('admin.surveys.getMemberSurvey') }}";
    var table;
    var manageTable = $("#surveyMemberTable");
    function myFunc() {
        table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'members'
                },
                columns: [
                    {data: 'id'},
                    {data: 'first_name'},
                    {data: 'last_name'},
                    {data: 'email'},
                    {data: 'telephone'},
                    {data: 'gender'},
                    {data: 'date',
                        render: function (data, type, row) {
                            var today=new Date();
                            var dt2=new Date(row.date)
                            var diffYear =(today.getTime() - dt2.getTime()) / 1000;
                            diffYear /= (60 * 60 * 24);
                            var age=Math.abs(Math.round(diffYear/365.25));

                            return age;

                        }
                    }],

                columnDefs: [
                    {
                        orderable: false,
                        className: 'select-checkbox',
                        targets:   0,
                        visible: false,
                        width: '1%',
                        render: function (data, type, full, meta){
                            return '<input  type="checkbox" name="user_id">';
                        }
                    }, {
                        "targets": [1],
                        "visible": false,
                        "searchable": false
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                order: [[1, 'asc']]
            }
        );
    }
    $(document).ready(function() {
        myFunc();

        $('#surveyMemberTable tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('selected');
        } );

        // Handle form submission event
        $('#send-form').on('submit', function(e){
            e.preventDefault();
            var form =  $(this);

               // var rows_selected = table.column(0).checkboxes.selected();
            var rows_selected = table.rows('.selected').data();

            // var ids = $.map(table.rows('.selected').data(), function (item) {
            //     return item[0]
            // });
            // console.log(ids)

            $.each(rows_selected, function(index, rowId){
                console.log(rowId.id);
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'users[]')
                        .val(rowId.id)
                );
            });
//                console.log(myUsers);


//                formData.append("user", myUsers);
            var btn = $('#btnSave');
            // btn.button('loading');
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize()
            }).done(function (data) {
                console.log(data);
                table.destroy();
                myFunc();

                if (data.survey == "ok") {
                    // btn.button('reset');
                    form[0].reset();
                    $('#add-messages').html('<div class="alert alert-success flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Survey Assigned  successfully . </div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });
                }
            }).fail(function (response) {
                console.log(response.responseJSON);

                // btn.button('reset');
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


<script src="{{asset('/public/dashboard/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/public/dashboard/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
{{--<script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>--}}
<script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
<script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
<script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
{{--<script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>--}}
{{--<script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>--}}
{{--<script src="{{asset('/public/dashboard/assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>--}}
<script src="{{asset('/public/dashboard/assets/js/table-data.js')}}"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endsection

