<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <title>{{$setting->company_name}} - {{$pageTitle}} </title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- CSS Global Compulsory -->
    {!! HTML::style('front_assets/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! HTML::style('front_assets/css/style.css?v=2')!!}
    <!-- CSS Implementing Plugins -->

    {!! HTML::style('front_assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! HTML::style('front_assets/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css') !!}

    {!! HTML::style('front_assets/plugins/scrollbar/src/perfect-scrollbar.css') !!}
    {!! HTML::style('front_assets/plugins/fullcalendar/fullcalendar.css') !!}
    {!! HTML::style('front_assets/plugins/fullcalendar/fullcalendar.print.css',array('media' => 'print')) !!}


    <!-- CSS Page Style -->
    {!! HTML::style('front_assets/css/pages/profile.css') !!}



    <!-- CSS Theme -->
    {!! HTML::style("front_assets/css/theme-colors/$setting->front_theme.css") !!}
    {!! HTML::style('assets/global/plugins/uniform/css/uniform.default.min.css')!!}
    <!-- CSS Customization -->
    <link rel="icon" href="{{ $setting->favicon_image_url }}" sizes="16x16">

    {!! HTML::style('front_assets/css/custom.css') !!}
    {!! HTML::style('assets/global/plugins/froiden-helper/helper.css') !!}
    @yield('head')

</head>

<body>
    <div class="wrapper">
        <!--=== Header ===-->
        <div class="header">
            <!-- Navbar -->
            <div class="navbar navbar-default mega-menu" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-bars"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('dashboard.index')}}">
                            {!! HTML::image($setting->logo_image_url,'Logo',array('class'=>'logo-default','id'=>'logo-header','height'=>'30px'))!!}

                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            @if ($active_company->license_expired != 1)

                            <!-- Home -->
                            <li class="{{isset($homeActive) ? $homeActive : ''}}">
                                <a href="{{ route('dashboard.index')}}">
                                    {{__('menu.home')}}
                                </a>
                            </li>
                            <!-- End Home -->
                            @if($setting->leave_feature==1)
                            <!-- Leave -->
                            <li class="dropdown {{isset($leaveActive) ? $leaveActive : ''}}">
                                <a href="" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    {{__('menu.leave')}}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="" 
                                    onclick="leaveModal();return false;"> {{__('menu.applyLeave')}}</a></li>
                                    <li><a href="{{route('leaves.index')}}"> {{__('menu.myLeave')}}</a></li>

                                </ul>
                            </li>
                            @endif
                            <!-- Leave -->
                            <li class="dropdown @if(isset($salaryActive)) {{ $salaryActive}} @elseif (Route::is(" front.expenses.index")) open @endif">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    @lang('menu.self')
                                </a>
                                <ul class="dropdown-menu">
                                    @if($setting->payroll_feature==1)
                                    <li><a href="{{ route('front.salary')}}"> {{__('menu.salarySlip')}}</a>
                                    </li>
                                    @endif
                                    <!-- @if($setting->expense_feature==1)
                                    <li>
                                        <a href="{{route('front.expenses.index')}}"> {{trans('menu.expenseFront')}}</a>
                                    </li>
                                    @endif -->
                                </ul>
                            </li>
                            <!-- End Leave -->
                            <!-- End Home -->


                            <!-- Job -->
                            <!-- @if($setting->jobs_feature==1)
                            <li class="{{isset($jobActive) ? $jobActive : ''}}">
                                <a href="{{ route('jobs.index')}}">
                                    {{__('menu.job')}}
                                </a>
                            </li>
                            @endif -->
                            <!-- Job -->


                            <!-- @if($setting->mark_attendance==1 && $setting->attendance_setting_set == 1)
                            {{--Attendance--}}

                            <li class="{{isset($attendanceActive) ? $attendanceActive : ''}}">
                                <a href="{{ route('front.attendance.index')}}">
                                    {{__('core.attendance')}}
                                </a>
                            </li>
                            @endif -->

                            {{--End Attendance--}}
                            @endif
                            <!-- My Account -->
                            <li class="dropdown {{isset($accountActive) ? $accountActive : ''}}">
                                <a href="" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    {{__('menu.myAccount')}}
                                </a>

                                <ul class="dropdown-menu">

                                    @if ($active_company->license_expired != 1)
                                    <li><a href="" data-toggle="modal" data-target=".change_password_modal" id="change_password_link"> {{__('menu.changePassword')}}</a></li>
                                    <li><a href="{{ route('front.profileEmp')}}"> {{'Profile'}}</a>
                                    </li>
                                    @endif
                                    <!-- Logout -->
                                    @if(auth()->guard('employee')->check())
                                    <li>
                                        <a href="{{route('front.logout')}}">
                                            {{__('menu.logout')}}
                                        </a>

                                    </li>
                                    @endif
                                    <!-- End Logout -->

                                </ul>
                            </li>
                            <!-- End Leave -->

                        </ul>
                    </div>
                    <!--/navbar-collapse-->
                </div>
            </div>

            <!-- End Navbar -->
        </div>

        <!--=== End Header ===-->

        <!--=== Profile ===-->
        <div class="profile container content">

            {{----------------MAINTENANCE CHECK----------------}}
            @include('maintenance_check')
            {{----------------MAINTENANCE CHECK----------------}}


            <div class="row">
                <!--Left Sidebar-->
                <div class="col-md-3 profile-div md-margin-bottom-40 @if(!isset($homeActive))hidden-sm hidden-xs @endif">
                    {!! HTML::image($employee->profile_image_url,'ProfileImage',['class'=>"img-responsive profile-img margin-bottom-20",'style'=>'border:1px solid #ddd;margin:0 auto']) !!}


                    {{--<img class="img-responsive profile-img margin-bottom-20" src="front_assets/img/team/5.jpg" alt="">--}}
                    <p>
                    <h3 class="text-center employee-name">{{$employee->full_name}}</h3>
                    <h6 class="text-center designation-name">{{$employee->getDesignation->designation}}</h6>
                    <h6 class="service-block-u bg-color forbigBtn" style="text-align: center;padding: 10px;">

                        <strong>{{__('core.atWorkFor')}} : </strong>{{ $employee->work_duration }}
                    </h6>
                    </p>
                    <hr>
                    <div class="service-block-v3 bg-color  service-block-u">
                        <!-- STAT -->
                        <div class="row profile-stat">
                            <div class="col-md-4 col-sm-4 col-xs-6" data-toggle="tooltip" data-placement="bottom" title="{!! date('F') !!}">
                                <div class="uppercase nuber-div profile-stat-title">
                                    {{$attendance_count}}
                                </div>
                                <div class="uppercase text-div profile-stat-text">
                                    {{__('core.attendance')}}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6" data-toggle="tooltip" data-placement="bottom" title="{{__('core.leaves')}}">
                                <div class="uppercase nuber-div profile-stat-title">
                                    {{$leaveLeft}}
                                </div>
                                <div class="uppercase text-div profile-stat-text">
                                    {{__('core.leaves')}}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6" data-toggle="tooltip" data-placement="bottom" title="{{__('core.totalAwardsWon')}}">
                                <div class="uppercase nuber-div profile-stat-title">
                                    {{count($employee->awards)}}
                                </div>
                                <div class="uppercase text-div profile-stat-text">
                                    {{__('core.awards')}}
                                </div>
                            </div>
                        </div>
                        <!-- END STAT -->
                    </div>


                    <!--Notification-->
                    @if(count($current_month_birthdays)>0)
                    <div class="panel-heading-v2 overflow-h">
                        <h2 class="heading-xs pull-left"><i class="fa fa-birthday-cake"></i> {{__('core.birthdays')}}</h2>
                    </div>
                    <ul id="scrollbar5" class="list-unstyled contentHolder margin-bottom-20" style="height: auto">
                        @foreach($current_month_birthdays as $birthday)
                        <li class="notification">
                            {!! HTML::image($birthday->profile_image_url,'ProfileImage',['class'=>"rounded-x"]) !!}


                            <div class="overflow-h">
                                <span><strong>{{$birthday->full_name}}</strong> {{__('core.hasBirthDayOn')}}</span>
                                <strong>{!! date('d F',strtotime($birthday->date_of_birth)) !!}</strong>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    @endif
                    <!--End Notification-->


                    <div class="margin-bottom-50"></div>
                </div>
                <!--End Left Sidebar-->

                {{--------------------Main Area----------------}}
                @yield('mainarea')
                {{---------------Main Area End here------------}}


            </div>
            <!--/end row-->


        </div>
        <!--=== End Profile ===-->

        <!--=== Footer Version 1 ===-->
        <div class="footer-v1">

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <p style="text-align: center;">
                                {!! date('Y') !!} &copy; {{$setting->company_name}}

                            </p>
                        </div>

                        <!-- Social Links -->
                        <div class="col-md-4">

                        </div>
                        <!-- End Social Links -->
                    </div>
                </div>
            </div>
            <!--/copyright-->
        </div>
        <!--=== End Footer Version 1 ===-->


        {{--------------------------Apply Leave  MODALS-----------------------------}}

        <div class="modal fade apply_modal in" id="applyLeave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                </div>
            </div>
        </div>
        {{------------------------Apply Leave MODALS-------------------------}}


        {{--------------------------Change Password  MODALS-----------------------------}}
        <div class="modal fade change_password_modal in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">
                            {{__('menu.changePassword')}}
                        </h4>
                    </div>
                    <div class="modal-body" id="change_password_modal_body">
                        {{--Load with Ajax call--}}

                    </div>
                </div>
            </div>
        </div>
        {{------------------------Change Password  MODALS-------------------------}}


    </div>
    <!--/wrapper-->

    <script src="https://cdn.ravenjs.com/2.1.0/raven.min.js" rel="core"></script>

    <!-- JS Global Compulsory -->
    {!! HTML::script('front_assets/plugins/jquery/jquery.min.js') !!}
    {!! HTML::script('front_assets/plugins/jquery/jquery-migrate.min.js') !!}
    {!! HTML::script('front_assets/plugins/bootstrap/js/bootstrap.min.js') !!}

    <!-- JS Implementing Plugins -->
    {!! HTML::script('front_assets/plugins/back-to-top.js') !!}

    <!-- Scrollbar -->
    {!! HTML::script('front_assets/plugins/scrollbar/src/jquery.mousewheel.js') !!}
    {!! HTML::script('front_assets/plugins/scrollbar/src/perfect-scrollbar.js') !!}
    <!-- JS Customization -->
    {!! HTML::script('front_assets//plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js') !!}
    {!! HTML::script('front_assets/plugins/sky-forms/version-2.0.1/js/jquery.form.min.js') !!}
    <!-- JS Page Level -->
    {!! HTML::script('front_assets/plugins/lib/moment.min.js') !!}
    {!! HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js')!!}
    {!! HTML::script('assets/global/plugins/froiden-helper/helper.js')!!}
    @yield('footerjs')

    <!--[if lt IE 9]>
{!! HTML::script('front_assets/plugins/respond.js') !!}
{!! HTML::script('front_assets/plugins/html5shiv.js') !!}
<![endif]-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";
            $('.contentHolder').perfectScrollbar();

            /*$('#start_date').datepicker({
                dateFormat: 'dd/mm/yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>',
                minDate: 0,

                onSelect: function (selectedDate) {

                    var diff = ($("#end_date").datepicker("getDate") -
                        $("#start_date").datepicker("getDate")) /
                        1000 / 60 / 60 / 24 + 1; // days
                    if ($("#end_date").datepicker("getDate") != null) {
                        $('#daysSelected').html(diff);
                        $('#days').val(diff);
                    }
                    $('#end_date').datepicker('option', 'minDate', selectedDate);
                }
            });
            $('#end_date').datepicker({
                dateFormat: 'dd/mm/yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>',
                onSelect: function (selectedDate) {

                    $('#start_date').datepicker('option', 'maxDate', selectedDate);

                    var diff = ($("#end_date").datepicker("getDate") -
                        $("#start_date").datepicker("getDate")) /
                        1000 / 60 / 60 / 24 + 1; // days
                    if ($("#start_date").datepicker("getDate") != null) {
                        $('#daysSelected').html(diff);
                        $('#days').val(diff);
                    }

                }
            });*/

        });

        function leaveModal() {
              $.ajaxModal('#applyLeave', '{{route('leaves.create')}}');
        }
    </script>


    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        $('input[type=checkbox]').uniform();


        // Show change password modal body
        $('#change_password_link').click(function() {

            $('#change_password_modal_body').css("padding", "100px");
            // $('#change_password_modal_body').html('{!! HTML::image('front_assets/img/loader.gif') !!}');
            $('#change_password_modal_body').attr('class', 'text-center');  

            $.ajax({
                type: 'POST',
                url: "{{route('front.change_password_modal')}}",

                data: {},
                success: function(response) {

                    $('#change_password_modal_body').css("padding", "0px");
                    $('#change_password_modal_body').removeClass('text-center');
                    $('#change_password_modal_body').html(response);
                },

                error: function(xhr, textStatus, thrownError) {
                    $('#change_password_modal_body').html('<div class="alert alert-danger">Error Fetching data</div>');
                }
            });

        });

        function change_password() {
            $.easyAjax({
                type: 'POST',
                url: "{{route('front.change_password')}}",
                data: $('#change_password_form').serialize(),
                container: "#change_password_form",
                success: function(response) {
                    if (response.status === "success") {
                        $('.change_password_modal').modal('hide');
                    }
                }
            });
            return false;
        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <style>
        .header{
            border-bottom:none!important;
            box-shadow: 0 2px 5px 0px #d6cbcb;
            padding: 12px;
        }
        .header .navbar-brand img{
            width: 20rem!important;
            height: 5rem!important;
            object-fit: contain!important;
        }
        #submitbutton{
            border-radius:30px!important;
            overflow: hidden;
            background-color: orange!important;
            margin-bottom: 12px!important;
            width: 30%!important;
        }
        .btn-u{
            border-radius:30px!important;
            overflow: hidden;
            background-color: orange!important;
            margin-bottom: 12px!important;
            /* width: 30%!important; */
        }
        .btn-u i{
            margin-left:7px!important
        }
        .actions button{
            background-color: orange!important;
            border-radius:30px!important;
            overflow: hidden;
            border:none!important;
            font-size: 14px;
            margin: 12px;
           
        }
        .navbar-collapse ul li a{
           
            margin: 6px!important;
            border: none!important;
            background-color: #06224a!important;
            color: #ffff!important;
            
        }
        .navbar-collapse ul li a:hover{
           border-radius: 7px!important;
           transition: all 500ms ease!important;
           background-color: orange!important;;
           
            border: none!important;
            
        }
        .dropdown ul li a{
            background-color: orange!important;
            border-radius: 7px!important;   
        }

        .profile-div {
            padding: 15px 0;
        }

        .profile-img {
            height: 12rem;
            width: 12rem;
            border-radius: 10rem !important;

        }

        .employee-name {
            font-size: 2.5rem;
            margin: 0px;
        }

        .designation-name {
            font-size: 1.99rem;
        }

        thead,
        .panel-heading,
        .bg-color {
            background: #06224a !important;
        }

        .work-div {
            padding: 10px;
            font-size: 15px;
        }

        .nuber-div {
            font-size: 2.4rem;
        }

        .text-div {
            font-size: 1.2rem;
        }

        .panel-title {
            font-size: 1.999rem !important;
        }

        .primary-link {
            font-size: 1.5rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .dataTables_info,
        .dataTables_empty,
        .heading-text {
            font-size: 2.33rem;
        }

        .dataTables_length {
            font-size: 1.7rem;
            text-transform: capitalize;
        }

        .form-control {
            width: 70% !important;
            border-radius: 0.7rem !important;
            height: 3.5rem !important;
            margin:6px!important;
            border: 1px solid #06224a!important;
        }
        .fileinput .input-group {
            margin-left:16px;
            
        }
        label {
            font-size: 1.77rem;
        }

        thead {
            font-size: 1.77rem;
            color: white;
        }

        .btn-u {
            width: 25%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #8fbaf3;
        }
        li a{
            font-size: 2rem;
        }
        .dataTables_length select{
            width: 100%!important;
        }
        .service-block-u{

          
            display: flex;
            align-items: center;
            justify-content: center; 
    
        }
         .panel-heading {
             padding: 15px!important;;
           } 
        span.input-group-addon.btn.default.btn-file{
            border: 1px solid #06224a;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
            border-radius:0.5rem !important;
            color: white!important;
        }
        .profile .profile-body{
            padding: 0!important;
        }
        .modal-header{
            border-bottom:1px solid black!important;
        }
        .modal-header h4{
            
            text-align: center;
            font-size: 1.8rem!important;
            font-weight: 600!important;
        }
        .modal-header button{
            font-size: 3rem!important;
            font-weight: 800!important;
            
        }
        .form-group label{
            font-size: 15px!important;
            margin-top:7px!important;
          
        }
        .form-group input{
            border:1px solid!important;
        }
        .sky-form .input input{
            border-radius:6px!important;
            overflow: hidden!important;
           
        }
       
        .sky-form footer {
            display: flex;
            justify-content: center;
        }
        .sky-form .label{
            color:#585f69!important;
            font-weight: 600!important;
            font-size: 16px!important;
        }
        .sky-form footer button{
            background-color: orange!important;
            border-radius:30px!important;
        }
        .profile-div{
            background-color:#f7f7f7!important;
        }
        .profile .profile-body {
            padding:17px!important;
        }
        .form-horizontal .form-group{
            margin-left:0px!important;
        }
        
    </style>
        <style>
    .btn-block,.all-button ,button ,.input-group-addon{
        border-radius: 0.5rem !important;
        font-size: 1.5rem!important;    
        color: white!important;
        background-color: orange!important;
        border-color: orange!important;
       
    }
    .input-group  a{
        margin-left:12px!important;
    }

    .btn-block:hover,.all-button:hover,button:hover ,.input-group-addon:hover{
        background-color: #06224A !important;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px!important;
        color: white!important;
    }

    thead {
        background-color: #06224A !important;
        color: white;
    }

    thead th {
        font-size: 15px !important;
    }

    table tbody tr .message-div, table tbody tr .dataTables_empty,.dataTables_info {
        font-size: 15px !important;
    }

    select,input,.uneditable-input {
        width: 180px !important;
        border-radius: 0.7rem !important;
        height: 3.5rem!important;
        font-size: 1.2rem!important;
        border: 0.001px solid #06224A!important;
    }
    .pagination .paginate_button a, label{
        font-size: 1.5rem!important;
    text-transform: capitalize;
    color: #000;
    padding: 0px!important;
    }
    .pagination .paginate_button a{
        padding: 10px!important;
    }
    
    .load_notification{
        font-size: 2rem;
    }
    button.close{
        opacity: 1;
        padding:0px 6px;
    }
    .bootstrap-switch {
        /* border: 2px solid red!important; */
        border-radius: 2rem!important;
        height: 3rem!important;
    }
    .bootstrap-switch .bootstrap-switch-handle-on{
        height: 3.5rem!important;
    }
    .hidden-xs{
        font-size: 1.55rem;
    }
    .fc-prev-button{
        color:black!important;
    }
    .fc-next-button{
        color:black!important;

    }
    .ui-datepicker-calendar th {
    color: #997474 !important;
    background: #e5e1d2!important;
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
</style>

</body>

</html>