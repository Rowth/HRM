@extends('front.layouts.email_layout')

@section('email_content')
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            border-color: #aaa;
            margin: 0px auto;
        }

        .tg td {
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: #aaa;
            color: #333;
            background-color: #fff;
        }

        .tg th {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: #aaa;
            color: #fff;
            background-color: #f38630;
        }

        .tg .tg-0ord {
            text-align: right
        }

        .tg .tg-s6z2 {
            text-align: center
        }

        .tg .tg-z2zr {
            background-color: #FCFBE3
        }

        .tg .tg-gyqc {
            background-color: #FCFBE3;
            text-align: right
        }
    </style>
    <strong>{{ $full_name }}</strong> {{ trans('email.appliedLeave') }}

    <br /><br />

    <table style="width:100%;border-collapse:collapse;border-spacing:0;border-color:#aaa;margin:0px auto">
        <tr>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#fff;background-color:#f38630;text-align:center"
                colspan="6">{{ trans('core.leaves') }}</th>

        </tr>
        @if ($emailType == 'single')
            <tr>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#FCFBE3">
                    {{ trans('core.date') }}</td>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#FCFBE3">
                    {{ trans('core.leaveTypes') }}</td>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#FCFBE3">
                    {{ trans('core.reason') }}</td>
            </tr>

            @foreach ($dates as $index => $value)
                <tr>
                    <td
                        style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff">
                        {{ $value }}</td>
                    <td
                        style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;">
                        {{ $leaveType[$index] }}</td>
                    <td
                        style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;">
                        {{ $reason[$index] }}</td>
                </tr>
            @endforeach
        @elseif($emailType == 'date_range')
            <tr>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#FCFBE3">
                    {{ trans('core.date') }}</td>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#FCFBE3">
                    {{ trans('core.days') }}</td>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#FCFBE3">
                    {{ trans('core.leaveTypes') }}</td>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#FCFBE3">
                    {{ trans('core.reason') }}</td>
            </tr>
            <tr>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff">
                    {{ $dates }}</td>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;">
                    {{ $days }}</td>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;">
                    {{ $leaveType }}</td>
                <td
                    style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;">
                    {{ $reason }}</td>
            </tr>
        @endif


    </table>



    <br /><br />
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
            font-size: 1.888rem !important;
        } */
        /*
        table tbody tr .message-div, table tbody tr .dataTables_empty,.dataTables_info {
            font-size: 2.111rem !important;
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
