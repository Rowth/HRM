@extends('admin.adminlayouts.adminlayout')

@section('head')


    <!-- BEGIN PAGE LEVEL STYLES -->

    {!! HTML::style("assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css") !!}
    {!! HTML::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css") !!}
    {!! HTML::style("assets/global/plugins/jquery-multi-select/css/multi-select.css") !!}
    {!! HTML::style("assets/global/plugins/fullcalendar/fullcalendar.min.css") !!}

    <!-- END PAGE LEVEL STYLES -->

@stop


@section('mainarea')

    <!-- BEGIN PAGE HEADER-->
    <div class="page-head">
        <div class="page-title"><h1>
                {{ trans("pages.holidays.indexTitle") }} - {{ $current_year }}
            </h1></div>
    </div>
    <div class="page-bar">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a onclick="loadView('{{route('admin.dashboard.index')}}')">{{trans('core.dashboard')}}</a>
                <i class="fa fa-circle"></i>
            </li>

            <li>
                <span class="active">{{ trans("pages.holidays.indexTitle") }}</span>
            </li>
        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->

    <div id="load">
        {{--INLCUDE ERROR MESSAGE BOX--}}

        {{--END ERROR MESSAGE BOX--}}
    </div>

    <div class="portlet light bordered">
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-3">
                    {{--<div class="row margin-bottom-10">--}}
                    {{--{!!  Form::open(['route' => 'admin.holidays.change_year', 'method' => 'get']) !!}--}}
                    <div class="margin-bottom-10">
                        <a class="btn all-button green btn-block" data-toggle="modal" href="#static">
                            {{trans('core.btnAddHoliday')}}
                            <i class="fa fa-plus"></i> </a>
                    </div>
                    <hr>
                    <div class="margin-bottom-10">
                        <div class="input-group  date date-picker-year" data-date-viewmode="years">
							<span class="input-group-btn">
								<button class="btn default" type="button">
									<i class="fa fa-calendar"></i> @lang("core.year"):
								</button>
							</span>
                            <input type="text" class="form-control" readonly="" id="year" name="year"
                                   value="{{$current_year}}">
                        </div>
                    </div>
                    {{--{!! Form::close() !!}--}}
                    {{--</div>--}}


                    
                    <ul class="ver-inline-menu tabbable margin-bottom-10 monthul">
                        @foreach($months as $key => $month)
                            @if($year != $current_year)
                            <li  class="firstli{{$month}} <?php if($month== $months[0]) echo 'active'?>" @if($month== $months[0]) id="sectionli" @endif>
                                <a data-toggle="tab" href="{{ $month }}" id = "firstli" 
                                   onclick="gotoDate('{{ \Carbon\Carbon::parse("first day of ".$month." ".$current_year)->format("Y-m-d") }}')">
                                    <i class="fa fa-calendar"></i> {{ trans('core.'.$month.'') }} </a>
                                <span class="after">
							</span>
                            </li>
                           @else
                            <li  class="firstli{{$month}} <?php if($month== $currentMonth) echo 'active'; ?>" >
                                <a data-toggle="tab" href="{{ $month }}" id = "firstli" 
                                   onclick="gotoDate('{{ \Carbon\Carbon::parse("first day of ".$month." ".$current_year)->format("Y-m-d") }}')">
                                    <i class="fa fa-calendar"></i> {{ trans('core.'.$month.'') }} </a>
                                <span class="after">
							</span>
                            </li>
                            @endif
                        
                            
                        @endforeach

                    </ul>
                </div>
                <div class="col-md-9">
                    <div id="calendar"></div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    {{--Add Holidays MODALS--}}

    <div class="modal fade apply_modal in" id="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><strong>{{trans('core.addHolidays')}}</strong></h4>
                </div>
                {!! Form::open(array('route'=>"admin.holidays.store",'class'=>'form-horizontal ajax_form','method'=>'POST')) !!}
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <ul class="nav nav-tabs">
                        <!-- <li class="active">
                            <a href="#tab_1" data-toggle="tab">@lang("core.commonHolidays")</a>
                        </li> -->
                        <li class="active">
                            <a href="#tab_2" data-toggle="tab">@lang("core.customHoliday")</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- <div class="tab-pane fade active in" id="tab_1">
                            <div class="form-body">
                                <div class="form-group last">
                                    <div class="col-md-12">
                                        <select multiple="multiple" class="multi-select" id="holidays_list"
                                                name="holidays_list[]">
                                            <optgroup label="@lang("core.occasionsCaps")">
                                                @foreach($holidays_list as $holiday_item)
                                                    <option value="{{ $holiday_item->date }}|{{ $holiday_item->name }}"
                                                            @if($holidays->contains("date", $holiday_item->date)) selected
                                                            rel="previouslySelected" @endif>{{ \Carbon\Carbon::parse($holiday_item->date)->format("M j, Y") }}
                                                        - {{ $holiday_item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            {{--<optgroup label="@lang("core.customCaps")">--}}
                                            {{--@foreach($holidays as $holiday)--}}
                                            {{--<option value="{{ $holiday->date }}|{{ $holiday->occassion }}" selected rel="previouslySelected">{{ \Carbon\Carbon::parse($holiday->date)->format("M j") }} - {{ $holiday->occassion }}</option>--}}
                                            {{--@endforeach--}}
                                            {{--</optgroup>--}}
                                            <optgroup label="@lang("core.sundaysCaps")">
                                                @foreach($all_sundays as $sunday)
                                                    @if(!($holidays_list->contains("date", $sunday)))
                                                        <option value="{{ $sunday }}|@lang("core.officeOff")"
                                                                @if($holidays->contains("date", $sunday)) selected
                                                                rel="previouslySelected" @endif>{{ \Carbon\Carbon::parse($sunday)->format("M j, Y") }}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="@lang("core.saturdaysCaps")">
                                                @foreach($all_saturdays as $saturday)
                                                    @if(!($holidays_list->contains("date", $saturday)))
                                                        <option value="{{ $saturday }}|@lang("core.officeOff")"
                                                                @if($holidays->contains("date", $saturday)) selected
                                                                rel="previouslySelected" @endif>{{ \Carbon\Carbon::parse($saturday)->format("M j, Y") }}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="@lang("core.fridaysCaps")">
                                                @foreach($all_fridays as $friday)
                                                    @if(!($holidays_list->contains("date", $friday)))
                                                        <option value="{{ $friday }}|@lang("core.officeOff")"
                                                                @if($holidays->contains("date", $friday)) selected
                                                                rel="previouslySelected" @endif>{{ \Carbon\Carbon::parse($friday)->format("M j, Y") }}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        </select>


                                        <input type="hidden" name="removedHolidays" id="removedHolidays">
                                    </div>
                                </div>

                            </div>
                        </div> -->
                        <div class="tab-pane fade active in" id="tab_2">
                            <div class="form-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div>
                                            <input class="form-control form-control-inline input-medium date-picker"
                                                   data-date-format="dd-mm-yyyy" name="date[0]" type="text" value=""
                                                   placeholder="{{trans('core.date')}}"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div>
                                            <input class="form-control form-control-inline" type="text" name="occasion[0]"
                                                   placeholder="{{trans('core.occasion')}}"/>
                                        </div>
                                    </div>

                                </div>
                                <div id="insertBefore"></div>
                                <input type="hidden" name="removedHolidays" id="removedHolidays">
                                <button type="button" id="plusButton" class="btn btn-sm green form-control-inline">
                                    {{trans('core.add')}} {{trans('core.more')}} <i class="fa fa-plus"></i>
                                </button>

                            </div>
                        </div>
                    </div>


                    <!-- END FORM-->
                </div>
                <div class="modal-footer">
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" data-loading-text="{{trans('core.btnSubmitting')}}..."
                                        class="btn green" onclick="ajaxUpdateHolidays()"
                                        id="updateHolidays">{{trans('core.btnSubmit')}}</button>

                            </div>
                        </div>
                    </div>
                </div>
            {!!  Form::close()  !!}
            <!-- END EXAMPLE TABLE PORTLET-->
            </div>

        </div>
    </div>

    {{--Add Holidays MODALS--}}

    {{--MODAL CALLING--}}
    @include('admin.common.delete')
    {{--MODAL CALLING END--}}

@stop

@section('footerjs')

    {{--Page Level JS--}}
    {!! HTML::script("assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js") !!}
    {!! HTML::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js") !!}
    {!! HTML::script("assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js") !!}
    {!! HTML::script("assets/global/plugins/jquery.quicksearch.js") !!}
    {!! HTML::script('assets/js/ajaxform/jquery.form.min.js')!!}
    {!! HTML::script("assets/global/plugins/moment.min.js")!!}
    {!! HTML::script("assets/global/plugins/fullcalendar/fullcalendar.min.js")!!}
    {!! HTML::script("assets/global/plugins/fullcalendar/lang-all.js")!!}
    {!! HTML::script("assets/admin/pages/scripts/components-pickers.js") !!}
    {{--Page Level js end--}}
    <script>
        ComponentsPickers.init();

        var Calendar = function () {


            return {
                //main function to initiate the module
                init: function () {
                    Calendar.initCalendar();
                },

                initCalendar: function () {

                    if (!jQuery().fullCalendar) {
                        return;
                    }

                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();

                    var h = {};


                    if ($('#calendar').parents(".portlet").width() <= 720) {

                        $('#calendar').addClass("mobile");
                        h = {
                            left: 'title, prev, next',
                            center: '',
                            right: 'today,month'
                        };
                    } else {
                        $('#calendar').removeClass("mobile");
                        h = {
                            left: 'title',
                            center: '',
                            right: 'prev,next,today'
                        };
                    }

                    $('#calendar').fullCalendar('destroy'); // destroy the calendar
                    $('#calendar').fullCalendar({ //re-initialize the calendar
                        lang: '{{ Lang::getLocale() }}',
                        header: h,
                        defaultView: 'month',
                        eventColor: "#E7505A",

                        @if($year != $current_year)
                        defaultDate: moment("{{ \Carbon\Carbon::parse("first day of january ".$current_year)->format("Y-m-d") }}"),
                        @endif
                        eventRender: function (event, element, view) {

                            var i = document.createElement('i');
                            i.className = 'fa';
                            i.classList.add("fa-trash");
                            i.classList.add("btn");
                            i.classList.add("grey-mint");
                            i.classList.add("btn-xs");
                            i.addEventListener("click", function () {
                                del(event.id, event.start);
                            });
                            element.find('div.fc-content').prepend(i);
                        },
                        events: [
                            
                                @foreach($holidays as $holiday)
                            {
                                "title": "{!! $holiday->occassion !!}",
                                "start": "{{ $holiday->date }}",
                                "id": {{ $holiday->id }}},
                            @endforeach
                        ]

                    });
                }
            };
        }();

        Calendar.init();

        function gotoDate(date) {
            $("#calendar").fullCalendar("gotoDate", date);
        }

        function ajaxUpdateHolidays() {


            // Prepare list of removed holidays
            var list = "";
            $("#holidays_list").find("option[rel='previouslySelected']:not(:selected)").each(function () {
                list += $(this).val() + "~";
            });

            $("#removedHolidays").val(list);

            $.easyAjax({
                url: "{!! route('admin.holidays.store') !!}",
                type: "POST",
                data: $(".ajax_form").serialize(),
                container: ".ajax_form",
            });

        }

        $('#holidays_list').multiSelect({
            selectableOptgroup: true,
            selectableHeader: "<label><strong>@lang("core.holidaysList")</strong></label><input type='text' class='form-control' autocomplete='off' placeholder='@lang("core.searchList")'>",
            selectionHeader: "<label><strong>@lang("core.selectedHolidays")</strong></label><input type='text' class='form-control' autocomplete='off' placeholder='@lang("core.searchList")'>",
            afterInit: function (ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function (e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function (e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function () {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function () {
                this.qs1.cache();
                this.qs2.cache();
            }
        });

        var $insertBefore = $('#insertBefore');
        var $i = 0;

        $('#plusButton').click(function () {
            $i = $i + 1;
            $(' <div class="col-md-6"> ' +
                '<div class="form-group"><div><input class="form-control form-control-inline input-medium date-picker' + $i + '" name="date[' + $i + ']" type="text" value="" placeholder="{{trans('core.date')}}"/></div></div></div>' +
                '<div class="col-md-6"><div class="form-group"><div><input class="form-control form-control-inline" name="occasion[' + $i + ']" type="text" value="" placeholder="{{trans('core.occasion')}}"/></div></div><div>' +
                '</div>').insertBefore($insertBefore);
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.date-picker' + $i).datepicker();
        });

        function del(id, date) {

            $('#deleteModal').modal("show");
            $('#deleteModal').find('#info').html(prepareMessage("@lang("messages.holidayDeleteConfirm")", ":holiday", date.format("Do MMM, YYYY")));
            $('#deleteModal').find("#delete").off().click(function () {
                var url = "{{ route('admin.holidays.destroy',':id') }}";
                url = url.replace(':id', id);
                var token = "{{ csrf_token() }}";
                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {'_token': token, "id": id},
                    container: "#deleteModal",
                    success: function (response) {
                        $('#calendar').fullCalendar("removeEvents", id);
                        $("#holidays_list").find("option[value^='" + date.format("YYYY-MM-DD") + "']").prop("selected", false).removeAttr("selected");
                        $('#holidays_list').multiSelect('refresh');
                        $('#deleteModal').modal('hide');

                        $('#row' + id).fadeOut(500);
                    }
                });


            });

        }


        $(".date-picker-year").datepicker({
            format: "yyyy", // Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years"
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
            var year = $('#year').val();
            loadView('{{url('admin/holidays/index').'/'}}' + year.replace(/\s/g, ''));
        });
    </script>


    <script>
    $(".fc-next-button").click(function() {
        var yearMonth = $('.fc-left').text();
        var arr = yearMonth.split(' ');
        var year = arr[1];
        var month = arr[0]; 
        $('input').val(year);
        $('.monthul li').removeClass('active');
        $(".monthul li").each(function () {
        var class1 =$(this).attr('class');
        let result = class1.slice(7);
       if(result===month){
        $(this).addClass('active');
       }
       loadView('{{url('admin/holidays/index').'/'}}' + year.replace(/\s/g, ''));
    });
    });
    </script>

    <script>

     $(".fc-prev-button").click(function() {
        var yearMonth = $('.fc-left').text();
        var arr = yearMonth.split(' ');
        var year = arr[1];
        var month = arr[0]; 
        $('input').val(year);
        $('.monthul li').removeClass('active');
        $(".monthul li").each(function () {
        var class1 =$(this).attr('class');
        let result = class1.slice(7);
       if(result===month){
        $(this).addClass('active');
       }
    });
        
    });
    </script>

    // <script>
    // $(".fc-prev-button").click(function() {
    //     var yearMonth = $('.fc-left').text();
    //     var arr = yearMonth.split(' ');
    //     console.log(arr);
    //     var year = arr[1];
    //     loadView('{{url('admin/holidays/index').'/'}}' + year.replace(/\s/g, ''));
        
    // });
    // </script>
<style>



.table-condensed th{
       background:#eef1f5!important;
   }   
   .fc-button {
    background:orange!important;
    color:white!important;
   }
    .fc-button:hover{
       color:white!important;
   }
</style>
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
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px!important;
    }
   
    
    thead {
        background-color: #06224A !important;
        color: white;
    }

    // thead th {
    //     font-size: 1.888rem !important;
    // }

    // table tbody tr .message-div, table tbody tr .dataTables_empty,.dataTables_info {
    //     font-size: 2.111rem !important;
    // }

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
        height: 3rem!important;
    }
    .bootstrap-switch .bootstrap-switch-handle-on{
        height: 3.5rem!important;
    }
    .hidden-xs{
        font-size: 1.55rem;
    }
</style>
@stop
