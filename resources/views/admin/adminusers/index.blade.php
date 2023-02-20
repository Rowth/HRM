@extends('admin.adminlayouts.adminlayout')

@section('head')


    <!-- BEGIN PAGE LEVEL STYLES -->

    {!! HTML::style("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css") !!}
    <!-- END PAGE LEVEL STYLES -->

@stop


@section('mainarea')


    <!-- BEGIN PAGE HEADER-->
    <div class="page-head">
        <div class="page-title"><h1>
                {{$pageTitle}}
            </h1></div>
    </div>
    <div class="page-bar">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a onclick="loadView('{{route('admin.dashboard.index')}}')">{{trans('core.dashboard')}}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">{{trans('core.settings')}}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">@lang("core.admins")</span>

            </li>

        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">


            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div id="load">


            </div>
            <div class="portlet light bordered">


                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row ">
                            <div class="col-md-6">
                                <a class="btn all-button green" onclick="showAdd();">
                                    {{trans('core.btnAddAdmin')}}
                                    <i class="fa fa-plus"></i> </a>
                            </div>
                            <div class="col-md-6 form-group text-right">
                                <span id="load_notification"></span>
                                <input type="checkbox" onchange="ToggleEmailNotification('admin_add');return false;"
                                       class="make-switch" name="admin_add" @if($loggedAdmin->company->admin_add==1)checked
                                       @endif data-on-color="success" data-on-text="{{trans('core.btnYes')}}"
                                       data-off-text="{{trans('core.btnNo')}}" data-off-color="danger">
                                <strong>{{trans('core.emailNotification')}}</strong><br>
                            </div>
                        </div>
                    </div>


                    <table class="table table-striped table-bordered table-hover" id="admins">
                        <thead>
                        <tr>
                            <th> @lang("core.serialNo") </th>
                            <th> {{trans('core.name')}} </th>
                            <th> {{trans('core.email')}} </th>
                            <th> {{trans('core.createdOn')}} </th>
                            <th class="text-center"> {{trans('core.actions')}} </th>
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

    {{--EDIT  MODALS--}}

    <div id="static_edit" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" id="edit-form-body">
            <div class="modal-content">

                <div class="modal-body" id="edit-modal-body">
                </div>
            </div>

        </div>
    </div>


    @include('admin.common.delete')
    @include('admin.common.show-modal')

@stop



@section('footerjs')


    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!!  HTML::script("assets/global/plugins/datatables/datatables.min.js")!!}
    {!! HTML::script("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js") !!}
    {!! HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")!!}

    <!-- END PAGE LEVEL PLUGINS -->

    <script>


        var table = $('#admins').dataTable({
            {!! $datatabble_lang !!}
            processing: true,
            serverSide: true,
            "ajax": "{{ URL::route("admin.ajax_admin_users") }}",
            "aaSorting": [[3, "desc"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'edit', name: 'edit'}
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
        function del(id, name) {

            $('#deleteModal').modal('show');

            $("#deleteModal").find('#info').html('Are you sure ! You want to delete?');

            $('#deleteModal').find("#delete").off().click(function () {

                var url = "{{ route('admin.admin_users.destroy',':id') }}";
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

        function showEdit(id) {
            var url = "{{ route('admin.admin_users.edit',':id') }}";
            url = url.replace(':id', id);
            $.ajaxModal('#showModal', url);

        }

        function showAdd() {
            var url = "{{ route('admin.admin_users.create') }}";
            $.ajaxModal('#showModal', url);

        }

        function addAdminSubmit() {

            url = "{{route('admin.admin_users.store')}}";
            $.easyAjax({
                type: 'POST',
                url: url,
                container: '.ajax_form',
                data: $('.ajax_form').serialize(),
                success: function (response) {
                    if (response.status === "success") {
                        $('#showModal').modal('hide');
                        table.fnDraw();
                    }

                }
            });
        }

        function updateAdminSubmit(id) {
            var url = "{{ route('admin.admin_users.update',':id') }}";
            url = url.replace(':id', id);
            $.easyAjax({
                type: 'PUT',
                url: url,
                container: '.ajax_form',
                data: $('.ajax_form').serialize(),
                success: function (response) {
                    if (response.status === "success") {
                        $('#showModal').modal('hide');
                        table.fnDraw();
                    }

                }
            });
        }

    </script>
    <style>
        
        .company-logoimg{
            width: 150px!important;
    height: 150px!important;
    /* border:0.1rem solid #000!important; */
    border-radius: 121px!important;
    display: flex!important;
    align-items: center!important;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }
    .btn-block,.all-button ,.purple ,button ,.input-group-addon{
        border-radius: 2rem !important;
        font-size: 1.55rem;
        color: white!important;
        background-color: orange!important;
        border-color: orange!important;
    }
    .btn-block:hover,.all-button:hover,button:hover ,.input-group-addon:hover{
        background-color: #06224A !important;
    }
    .para-text{
        font-size: 1.7rem;
    }
    .all-button:hover {
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px!important;

    }

    thead {
        background-color: #06224A !important;
        color: white;
    }
    /* table tbody td{
        font-size: 2rem!important;
        vertical-align: middle!important;
    } */

    /* thead th {
        font-size: 1.888rem !important;
    } */

    table tbody tr .message-div, table tbody tr .dataTables_empty,.dataTables_info {
        font-size: 1.5rem !important;
    }

    select,input,.uneditable-input {
        width: 180px !important;
        border-radius: 0.7rem !important;
        height: 3.5rem!important;
        font-size: 1.2rem!important;
        border: 0.001px solid #06224A!important;
        color: black!important;
    }
    textarea,.select2-selection{
    font-size: 1.5rem!important;
    border: 0.001px solid #06224A!important;
    color: black!important;
    border-radius: 0.7rem !important;

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
        border-radius: 2rem!important;
    }
   
    .hidden-xs{
        font-size: 1.55rem;
    }
 .green,.blue,.purple,.red,.blue-madison,.blue-ebonyclay,.label-success{
       border-radius:.8rem!important;
       
   }
   .sorting_1{
    vertical-align: middle;
   }
   .purple span{
       font-size:13px!important;
   }
   .red span{
       font-size:13px!important;
   }
   .bootstrap-switch-container span{ 
       padding:8px 12px!important;
   }
   .fc-prev-button{
        color:black!important;
    }
    .fc-next-button{
        color:black!important;

    }
    </style>
@stop
