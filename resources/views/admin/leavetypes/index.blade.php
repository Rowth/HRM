@extends('admin.adminlayouts.adminlayout')

@section('head')

<!-- BEGIN PAGE LEVEL STYLES -->
{!! HTML::style("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css")!!}
{!! HTML::style("assets/global/plugins/datatables/plugins/responsive/responsive.bootstrap.css")!!}
@stop

@section('mainarea')


<!-- BEGIN PAGE HEADER-->
<div class="page-head">
    <div class="page-title">
        <h1>
            {{ trans("core.leaveTypes") }}
        </h1>
    </div>
</div>
<div class="page-bar">
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a onclick="loadView('{{route('admin.dashboard.index')}}')">@lang('core.dashboard')</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">{{ trans("pages.leaveTypes.indexTitle") }}</span>

        </li>

    </ul>

</div>
<!-- END PAGE HEADER-->

<div id="load">
    {{--INLCUDE ERROR MESSAGE BOX--}}

    {{--END ERROR MESSAGE BOX--}}
</div>
<!-- BEGIN PAGE CONTENT-->

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">

            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn all-button green" onclick="showAdd()">
                                @lang('core.btnAddLeaveType')
                                <i class="fa fa-plus"></i> </a>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>

                <table class="table table-striped custom-table datatable dataTable no-footerr" id="leaveType">
                    <thead>
                        <tr>
                            <th> @lang('core.leave') </th>
                            <th> @lang('core.leaveNumber') </th>
                            <th> @lang('core.status') </th>
                            <th> @lang('core.action') </th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->

    </div>
</div>
<!-- END PAGE CONTENT-->

{{--MODAL CALLING--}}
@include('admin.common.delete')
@include('admin.common.show-modal')
{{--MODAL CALLING END--}}

@stop


@section('footerjs')

<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! HTML::script("assets/global/plugins/datatables/datatables.min.js")!!}
{!! HTML::script("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js")!!}
{!! HTML::script("assets/global/plugins/datatables/plugins/responsive/dataTables.responsive.js")!!}
{!! HTML::script("assets/global/plugins/datatables/plugins/responsive/responsive.bootstrap.js")!!}

<!-- END PAGE LEVEL PLUGINS -->

<script>
    var table = $('#leaveType').dataTable({
        "cache": true,
        "bProcessing": true,
        "bServerSide": true,
        "bDestroy": true,
        "order": [
            [1, "asc"]
        ],
        "ajax": "{{ URL::route('admin.leavetypes.ajax_list') }}",
        "aoColumns": [{
                data: 'leaveType',
                name: 'leaveType'
            },
            {
                data: 'num_of_leave',
                name: 'num_of_leave',
                "searchable": false
            },
            {
                data: 'status',
                name: 'status'
            },
            // {data: 'id', name: 'id'},
            {
                data: 'edit',
                name: 'edit'
            },
        ],
        "lengthMenu": [
            [5, 15, 20, -1],
            [5, 15, 20, "All"] // change per page values here
        ],
        "language": {
            "emptyTable": "No data available",
            "search": '',
            "searchPlaceholder": "Search..."
        },
        "sPaginationType": "full_numbers",
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
            var row = $(nRow);
            row.attr("id", 'row' + aData['0']);
        }

    });

    // Show Delete Modal
    function del(id, name) {

        $('#deleteModal').modal('show');

        $("#deleteModal").find('#info').html('Are you sure ! You want to delete <strong>' + name + '</strong> ?');

        $('#deleteModal').find("#delete").off().click(function() {

            
            var url = "{{ route('admin.leavetypes.destroy',':id') }}";

            url = url.replace(':id', id);

            var token = "{{ csrf_token() }}";

            $.easyAjax({
                type: 'DELETE',
                url: url,
                data: {
                    '_token': token
                },
                container: "#deleteModal",
                success: function(response) {
                    if (response.status == "success") {
                        $('#deleteModal').modal('hide');
                        table.fnDraw();
                    }
                }
            });

        });
    }

    function changeStatus(id, status) {

        var url = "{{ route('admin.leave.change_status',':id') }}";
        url = url.replace(':id', id);

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {
                status: status
            },
            container: "#deleteModal",
            success: function(response) {
                if (response.status === "success") {
                    table.fnDraw();
                }
            }
        });

    }

    function showEdit(id, leaveType, num) {
        var url = "{{ route('admin.leavetypes.edit',':id') }}";
        url = url.replace(':id', id);
        $.ajaxModal('#showModal', url);

        $("#edit_leaveType").val(leaveType);
        $("#edit_num_of_leave").val(num);
    }

    function showAdd() {
        var url = "{{ route('admin.leavetypes.create') }}";
        $.ajaxModal('#showModal', url);

    }

    function addUpdateLeaveType(id) {

        if (typeof id != 'undefined') {
            var url = "{{ route('admin.leavetypes.update',':id') }}";
            url = url.replace(':id', id);
        } else {
            url = "{{route('admin.leavetypes.store')}}";
        }
        $.easyAjax({
            type: 'POST',
            url: url,
            container: '#leave_type_update_form',
            data: $('#leave_type_update_form').serialize(),
            success: function(response) {
                if (response.status == "success") {
                    $('#showModal').modal('hide');
                    table.fnDraw();
                }

            }
        });
    }
</script>
<style>
    .btn-block,
    .all-button,
    button,
    .input-group-addon {
        border-radius: 2rem !important;
        font-size: 1.55rem;
        color: white !important;
        background-color: orange !important;
        border-color: orange !important;
    }

    .btn-block:hover,
    .all-button:hover,
    button:hover,
    .input-group-addon:hover {
        background-color: #06224A !important;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px !important;
    }

    thead {
        background-color: #06224A !important;
        color: white;
    }

    /* thead th {
        font-size: 1.5rem !important;
        
    } */

    /* table tbody tr .message-div, table tbody tr .dataTables_empty,.dataTables_info {
        font-size: 1.5rem !important;
    } */

    select,
    input,
    .uneditable-input {
        width: 180px !important;
        border-radius: 0.7rem !important;
        height: 3.5rem !important;
        font-size: 1.2rem !important;
        border: 0.001px solid #06224A !important;
    }

    .pagination .paginate_button a,
    label {
        font-size: 1.5rem;
        text-transform: capitalize;
        color: #000;
        padding: 0px !important;
    }

    .pagination .paginate_button a {
        padding: 10px !important;
    }

    .form-group {
        display: flex !important;
        align-items: center !important;
    }

    .load_notification {
        font-size: 2rem;
    }

    .bootstrap-switch {
        /* border: 2px solid red!important; */
        border-radius: 2rem !important;
        height: 3rem !important;
    }

    .bootstrap-switch .bootstrap-switch-handle-on {
        height: 3.5rem !important;
    }

    .hidden-xs {
        font-size: 1.55rem;
    }

    .green,
    .blue,
    .purple,
    .red,
    .blue-madison,
    .blue-ebonyclay,
    .label-success {
        border-radius: .8rem !important;

    }

    .sorting_1 {
        vertical-align: middle;
    }

    .purple span {
        font-size: 13px !important;
    }

    .red span {
        font-size: 13px !important;
    }

    .bootstrap-switch-container span {
        padding: 8px 12px !important;
    }

    .fc-prev-button {
        color: black !important;
    }

    .fc-next-button {
        color: black !important;

    }
</style>
@stop