@extends('admin.adminlayouts.adminlayout')

@section('head')


    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style("assets/global/plugins/select2/css/select2.css")!!}
    {!! HTML::style("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css")!!}
    <!-- END PAGE LEVEL STYLES -->

@stop


@section('mainarea')


    <!-- BEGIN PAGE HEADER-->
    <div class="page-head">
        <div class="page-title"><h1>
                @lang("pages.jobs.indexTitle")
            </h1></div>
    </div>
    <div class="page-bar">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a onclick="loadView('{{route('admin.dashboard.index')}}')">{{trans('core.dashboard')}}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">@lang("pages.jobs.indexTitle")</span>
            </li>

        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">


            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div id="load">

                {{--INLCUDE ERROR MESSAGE BOX--}}

                {{--END ERROR MESSAGE BOX--}}

            </div>
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">

                                <a class="btn all-button  green" data-toggle="modal"
                                   onclick="loadView('{{URL::route('admin.jobs.create')}}')">
                                    {{__('core.btnAddJob')}}
                                    <i class="fa fa-plus"></i> </a>
                            </div>
                            <div class="col-md-6 form-group text-right">

                                <span id="load_notification"></span>
                                <input type="checkbox"
                                       onchange="ToggleEmailNotification('job_notification');return false;"
                                       class="make-switch" name="job_notification"
                                       @if($loggedAdmin->company->job_notification==1)checked @endif data-on-color="success"
                                       data-on-text="{{trans('core.btnYes')}}" data-off-text="{{trans('core.btnNo')}}"
                                       data-off-color="danger">
                                <strong>{{trans('core.emailNotification')}}</strong><br>
                            </div>
                        </div>
                    </div>


                    <table class="table table-striped table-bordered table-hover" id="jobs">
                        <thead>
                        <tr>
                            <th> @lang("core.serialNo") </th>
                            <th> {{trans('core.position')}} </th>

                            <th> {{trans('core.postedDate')}}  </th>
                            <th> {{trans('core.lastDateToApply')}}  </th>
                            <th> {{trans('core.closeDate')}}  </th>
                            <th> {{trans('core.status')}}  </th>
                            <th> {{trans('core.action')}}  </th>
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
    {{--MODAL CALLING END--}}
@stop



@section('footerjs')


    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!!  HTML::script("assets/global/plugins/select2/js/select2.min.js")!!}
    {!! HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")!!}
    {!!  HTML::script("assets/global/plugins/datatables/datatables.min.js")!!}
    {!!  HTML::script("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js")!!}

    <!-- END PAGE LEVEL PLUGINS -->

    <script>


        var table = $('#jobs').dataTable({
            processing: true,
            serverSide: true,
            {!! $datatabble_lang !!}
            "ajax": "{{ URL::route("admin.ajax_jobs") }}",
            "aaSorting": [[6, "desc"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'position', name: 'position'},
                {data: 'posted_date', name: 'posted_date'},
                {data: 'last_date', name: 'last_date'},
                {data: 'close_date', name: 'close_date'},
                {data: 'status', name: 'status'},
                {data: 'edit', name: 'edit'},
            ],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            "sPaginationType": "full_numbers",
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var oSettings = this.fnSettings();
                $("td:first", nRow).html(oSettings._iDisplayStart + iDisplayIndex + 1);
                return nRow;
            }

        });

        // Show Delete Modal
        function del(id,) {

            $('#deleteModal').modal('show');

            $("#deleteModal").find('#info').html('@lang("messages.jobDeleteConfirm")');

            $('#deleteModal').find("#delete").off().click(function () {

                var url = "{{ route('admin.jobs.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {'_token': token},
                    container: "#deleteModal",
                    success: function (response) {
                        if (response.status === "success") {
                            $('#deleteModal').modal('hide');
                            table.fnDraw();
                        }
                    }
                });

            });
        }
    </script>
    <style>
    .btn-block,.all-button ,button ,.input-group-addon{
        border-radius: 2rem !important;
        font-size: 1.55rem;
        color: white!important;
        background-color: orange!important;
        border-color: orange!important;
    }
    .btn-block:hover,.all-button:hover,button:hover ,.input-group-addon:hover{
        background-color: #06224A !important;
    }

    .all-button:hover {
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px!important;

    }

    thead {
        background-color: #06224A !important;
        color: white;
    }

    /* thead th {
        font-size: 1.888rem !important;
    }

    table tbody tr .message-div, table tbody tr .dataTables_empty,.dataTables_info {
        font-size: 1.5rem !important;
    } */

    select,input,.uneditable-input {
        width: 180px !important;
        border-radius: 0.7rem !important;
        height: 3.5rem!important;
        font-size: 1.2rem!important;
        border: 0.001px solid #06224A!important;
    }
    .pagination .paginate_button a, label{
        font-size: 1.5rem;
    text-transform: capitalize;
    color: #000;
    padding: 0px!important;
    }
    .pagination .paginate_button a{
        padding: 10px!important;
    }
    .form-group{
        display: flex!important;
        align-items: center!important;
    }
    .load_notification{
        font-size: 2rem;
    }
    .bootstrap-switch {
        /* border: 2px solid red!important; */
        border-radius: 2rem!important;
        height: 3.5rem!important;
    }
    .bootstrap-switch .bootstrap-switch-handle-on{
        height: 3.5rem!important;
    }
    .hidden-xs{
        font-size: 1.55rem;
    }
</style>
@stop
