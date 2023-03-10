@extends('front.layouts.frontlayout')

@section('head')
    {!! HTML::style('assets/global/css/plugins.css') !!}
    {!! HTML::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('mainarea')
    <div class="col-md-9">
        <!--Profile Body-->
        <div class="profile-body">
            <div class="row">
                <!--Profile Post-->
                <div class="col-sm-12">
                    <div id="outer_msg"></div>

                    <div class="panel " id="clock_panel">
                        <div class="panel-heading service-block-u">
                            <h3 class="panel-title"><i class="fa fa-clock-o"></i> @lang('core.todays')
                                {{ trans('core.attendance') }}
                            </h3>
                        </div>
                        <div class="panel-body">
                            <p id="alert"></p>
                            @if ($set_attendance == 3)
                                <div class="row">
                                    <h4 class="text-center">@lang('core.absentToday')</h4>
                                </div>
                            @elseif ($set_attendance == 2)
                                <div class="row">
                                    <h4 class="text-center">@lang('core.OfficeTimePassed')</h4>
                                </div>
                            @else
                                <form class="sky-form">
                                    <div id="alert_box"></div>
                                    <fieldset>
                                        <div class="row">
                                            <section class=" col col-4">
                                                <label class="control-label">@lang('core.currentTime')</label>
                                                <div class="input">
                                                    <i class="icon-prepend fa fa-clock-o"></i>
                                                    <input type="text" disabled id="current_time">
                                                </div>
                                            </section>
                                            <section class=" col col-4">
                                                <label class="control-label">@lang('core.IPAddress')</label>
                                                <div class="input">
                                                    <i class="icon-prepend fa fa-desktop"></i>
                                                    <input type="text" disabled value="{{ $ip_address }}">
                                                </div>
                                            </section>
                                            <section class="col col-4">
                                                <label class="control-label">@lang('core.workingFrom')</label>
                                                <div class="input">
                                                    <input class="form-control" placeholder="Office, Home, etc."
                                                        id="work_form" name="work_from" value="{{ $working_from }}">
                                                </div>
                                            </section>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <section>
                                            <label class="control-label">@lang('core.notes')</label>
                                            <label class="textarea textarea-resizable">
                                                <textarea rows="3" placeholder="Note to your manager" name="notes" id="notes">{{ $notes }}</textarea>
                                            </label>
                                        </section>
                                    </fieldset>
                                    <fieldset class="no-padding-fieldset">
                                        <div class="row">
                                            <div id="clocks">
                                                @if ($set_attendance == 1)
                                                    <section class="col col-6">
                                                        <div class="pull-right" id="clock_set_div">
                                                            @if ($clock_set == 1)
                                                                <span class="clock-time">
                                                                    <strong>@lang('core.clockIn')</strong>:
                                                                    {{ $clock_in_time->timezone($timezones[$setting->timezone])->format('h:i A') }}<br></span>
                                                                <p class="text-center">
                                                                    <small
                                                                        id="setClockInWords">{{ $clock_in_time->timezone($timezones[$setting->timezone])->diffForHumans() }}</small>
                                                                </p>
                                                            @else
                                                                <button type="button" class="btn-u btn-u-dark"
                                                                    id="clock_in" onclick="setClock();">@lang('core.clockIn')
                                                                </button>
                                                                <p id="demo"></p>
                                                            @endif
                                                        </div>
                                                    </section>
                                                    <section class="col col-6">
                                                        <div class="pull-left" id="clock_unset_div">
                                                            <button type="button" class="btn-u btn-u-dark" id="clock_out"
                                                                onclick="unsetClock()">@lang('core.clockOut')
                                                            </button>
                                                        </div>
                                                    </section>
                                                @endif
                                                @if ($set_attendance == 0)
                                                    <section class="col col-6">
                                                        <div class="pull-right">
                                                            <span class="clock-time">
                                                                <strong>@lang('core.clockIn')</strong>:
                                                                {{ $clock_in_time->timezone($timezones[$setting->timezone])->format('h:i A') }}<br>
                                                            </span>
                                                            <p class="text-center">
                                                                <small id="setClockInWords"></small>
                                                            </p>
                                                        </div>
                                                    </section>
                                                    <section class="col col-6">
                                                        <div class="pull-left">
                                                            <span class="clock-time">
                                                                <strong>@lang('core.clockOut')</strong>:
                                                                {{ $clock_out_time->timezone($timezones[$setting->timezone])->format('h:i A') }}<br></span>
                                                            <p class="text-center">
                                                                <small id="unSetClockInWords"></small>
                                                            </p>
                                                        </div>
                                                    </section>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            @endif

                        </div>
                        <!--End Profile Post-->
                    </div>
                    <!--/end row-->
                    <hr>

                </div>
                <!--End Profile Body-->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="outer_msg"></div>
                    <div class="panel ">
                        <div class="panel-heading service-block-u">
                            <h3 class="panel-title"><i class="fa fa-clock-o"></i>{{ trans('core.attendance') }}
                                @lang('core.summary')
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form class="sky-form">
                                    <fieldset class="no-padding-fieldset">
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="control-label">@lang('core.from')</label>
                                                <div class="input">
                                                    <i class="icon-append fa fa-calendar"></i>
                                                    <input type="text" name="from_date" id="from_date"
                                                        placeholder="{{ trans('core.startDate') }}">
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label class="control-label">@lang('core.to')</label>
                                                <div class="input">
                                                    <i class="icon-append fa fa-calendar"></i>
                                                    <input type="text" name="to_date" id="to_date"
                                                        placeholder="{{ trans('core.endDate') }}">
                                                </div>
                                            </section>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="attendance_table">
                                <thead>
                                    <tr>
                                        <th> {{ trans('core.serialNo') }} </th>

                                        <th class="all"> {{ trans('core.date') }} </th>
                                        <th class="all"> {{ trans('core.status') }} </th>
                                        <th class="min-tablet-l"> {{ trans('core.progress') }} </th>
                                        <th> @lang('core.hours')</th>

                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        <td>{{-- Serial Number --}}</td>
                                        <td>{{-- Month --}}</td>
                                        <td>{{-- Year --}}</td>
                                        <td>{{-- created On --}}</td>
                                        <td>{{-- created On --}}</td>

                                    </tr>


                                </tbody>
                            </table>

                        </div>
                        <!--End Profile Post-->
                    </div>
                    <!--/end row-->
                    <!--End Profile Body-->
                </div>
            </div>
        </div>
    </div>
    <style>
        button#clock_in {
            width: 100%;
        }

        button#clock_out {
            width: 100%;
        }
    </style>
@stop

@section('footerjs')
    {!! HTML::script('assets/global/plugins/datatables/datatables.min.js') !!}
    {!! HTML::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
    {!! HTML::script('assets/global/plugins/datatables/plugins/responsive/dataTables.responsive.min.js') !!}
    {!! HTML::script('assets/js/moment-timezone.js') !!}

    <script>
        var x = document.getElementById("demo");

        // function getLocation() {
        //     if (navigator.geolocation) {
        //         navigator.geolocation.getCurrentPosition(showPosition);
        //     } else {
        //         x.innerHTML = "Geolocation is not supported by this browser.";
        //     }
        // }

        // var latitude = '';
        // var longitude = '';

        // function showPosition() {
        //     if (navigator.geolocation) {
        //         navigator.geolocation.getCurrentPosition(function(result) {
        //             latitude = result.coords.latitude; // latitude value
        //             longitude = result.coords.longitude; // longitude value
        //             lat = latitude.toFixed(3);
        //             long = longitude.toFixed(3);
        //             return fetch("https://nominatim.openstreetmap.org/reverse?lat=" + lat + "&lon=" + long +
        //                     "&format=json")
        //                 .then(response => response.json())
        //                 .then(j => {
        //                     return j;
        //                 })
        //         });
        //     } else {
        //         alert("Geolocation is not supported by this browser.");
        //     }
        // }
    </script>

    <script>
        $('#clock_out').prop('disabled', true);
        @if (isset($clock_in_time))
            var clock_in_word = moment(
                '{{ $clock_in_time->timezone($timezones[$setting->timezone])->format('Y-m-d H:i:s') }}');
        @else
            var clock_in_word = null;
        @endif

        @if (isset($clock_out_time))
            var clock_out_word = moment(
                '{{ $clock_out_time->timezone($timezones[$setting->timezone])->format('Y-m-d H:i:s') }}');
        @else
            var clock_out_word = null;
        @endif
        var url = "{{ URL::route('front.attendance.ajax_attendance') }}";
        var clock_flag = '{{ $clock_set ?? '' }}';

        var momentTime = moment();




        {{-- var today = moment().tz('{{$timezones[$setting->timezone]}}'); --}}

        function startTime() {
            $('#current_time').val(moment().tz('{{ $timezones[$setting->timezone] }}').format('hh:mm:ss A'));
            if (clock_flag == '1') {
                $('#clock_out').prop('disabled', false);
            }
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0", +i
            }
            // add zero in front of numbers < 10
            return i;
        }

        $("#work_form").blur(function() {
            var work_from = $(this).val();

            $.ajax({
                type: "POST",
                url: "{!! route('front.attendance.work_from') !!}",
                data: {
                    'work_from': work_from
                }
            }).done(function(response) {
                return true;
            });
        });

        $("#notes").blur(function() {
            var notes = $(this).val();
            $.ajax({
                type: "POST",
                url: "{!! route('front.attendance.notes') !!}",
                data: {
                    'notes': notes
                }
            }).done(function(response) {
                return true;
            });
        });

        $('#from_date').on('change', function() {
            date_change();
        });
        $('#to_date').on('change', function() {
            date_change();
        });

        function setClock() {

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        var latitude = '';
        var longitude = '';

        var lat = '';
        var long = '';

        function showPosition() {
            console.log("showposition");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(result) {
                    latitude = result.coords.latitude; // latitude value
                    longitude = result.coords.longitude; // longitude value
                    var lat = latitude.toFixed(3);
                    var long = longitude.toFixed(3);
                    return fetch("https://nominatim.openstreetmap.org/reverse?lat=" + lat + "&lon=" + long +
                            "&format=json")
                        .then(response => response.json())
                        .then(j => {
                            console.log(j);

                            var location = j.display_name;
                            var data = $('.sky-form').serialize() + "&location=" + location;
                            console.log(data);

                            $.easyAjax({
                                type: "POST",
                                url: "{!! route('front.attendance.clockIn') !!}",
                                data: data,
                                messagePosition: 'inline',
                                container: "#clock_panel",
                                success: function(response) {
                                    console.log(response);
                                    if (response.status === "success") {
                                        clock_flag = 1;
                                        clock_in_word = moment(response.time_date);
                                        table.fnDraw();
                                        $('#clock_set_div').html(
                                            '<span class="clock-time"><strong>{{ __('core.clockIn') }}</strong>: ' +
                                            response.time +
                                            '<br></span><p class="text-center"><small id="setClockInWords">' +
                                            response.timeDiff + '</small></p>');
                                        setTimeout(function() {
                                            $('#alert').html('');
                                        }, 15000);
                                    }
                                }
                            });
                            // return j;
                        })
                });
            }
            return false;
        }

        var table = $('#attendance_table').dataTable({
            processing: true,
            serverSide: true,
            "ajax": url,
            "aaSorting": [
                [0, "asc"]
            ],
            columns: [{
                    data: 's_id',
                    name: 's_id'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'clock_out',
                    name: 'clock_out'
                },

                {
                    data: 'Hours',
                    name: 'Hours'
                },
            ],
            "sPaginationType": "full_numbers",
            "language": {
                "lengthMenu": "Display _MENU_ records per page",
                "info": "Showing page _PAGE_ of _PAGES_",
                "emptyTable": "{{ trans('messages.noDataTable') }}",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "{{ trans('core.search') }}:"
            },
            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                var oSettings = this.fnSettings();
                $("td:first", nRow).html(oSettings._iDisplayStart + iDisplayIndex + 1);
                return nRow;
            }
        });



        function unsetClock() {
            $.easyAjax({
                type: "POST",
                url: "{!! route('front.attendance.clockOut') !!}",
                messagePosition: 'inline',
                container: "#clock_panel",
                success: function(response) {

                    if (response.status == 'success') {
                        table.fnDraw();
                        clock_out_word = moment(response.unset_time);

                        $('#clock_unset_div').html(
                            '<span class="clock-time"><strong>{{ __('core.clockOut') }}</strong>: ' +
                            response.unset_time +
                            '<br></span><p class="text-center"><small id="unSetClockInWords">' + response
                            .unset_time_diff + '</small></p>');
                        setTimeout(function() {
                            $('#alert').html('');
                        }, 5000);
                    } else {
                        setTimeout(function() {
                            $('#alert').html('');
                        }, 5000);
                    }
                }
            });
            return false;
        }

        function date_change() {

            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            url = "{{ URL::route('front.attendance.ajax_attendance') }}?from_date=" + from_date + "&to_date=" + to_date;
            table.fnDraw();
        }

        function timeInWords(clock_in, clock_out) {
            if (clock_in != null) {
                $('#setClockInWords').html(clock_in.fromNow());
            } else {
                $('#setClockInWords').html('');
            }

            if (clock_out != null) {
                $('#unSetClockInWords').html(clock_out.fromNow());
            } else {
                $('#unSetClockInWords').html('');
            }
            setTimeout(timeInWords, 1000, clock_in_word, clock_out_word);
        }

        jQuery(document).ready(function() {
            startTime();
            timeInWords(clock_in_word, clock_out_word);
            table.fnDraw();
            $('#from_date').datepicker({
                dateFormat: 'dd-mm-yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });
            $('#to_date').datepicker({
                dateFormat: 'dd-mm-yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });
        });
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

        thead th {
            font-size: 15px !important;
        }

        table tbody tr .message-div,
        table tbody tr .dataTables_empty,
        .dataTables_info {
            font-size: 15px !important;
        }

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

        .btn-u {
            width: 100% !important;

        }
    </style>
@stop
