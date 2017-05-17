@extends('layouts.app')

@section('content')

    <style>
        table, tr, td {
            border: double;
            font-size: 16px;
        }
    </style>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        @if(!$reports->toArray())
            <div>
                <h1 style="color: red">{{ trans('transport/reports.no_reports') }}</h1>
            </div>
        @else
            <table>
                <tbody>
                <tr>
                    <td>
                        {{ trans('transport/reports.table.vehicle_title') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.date') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.route') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.left_terminal') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.speed_read') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.client_arrived') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.unload_time') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.client_left') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.terminal_arrived') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.speed_read') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.distance') }}
                    </td>
                    <td>
                        {{ trans('transport/reports.table.fuel') }}
                    </td>
                </tr>

                @foreach($reports as $report)
                    <tr>
                        <td>
                            {{ $report->getVehicle->first()['title'] }}
                        </td>
                        <td>
                            {{ $report->date }}
                        </td>
                        <td>
                            {{ $report->route }}
                        </td>
                        <td>
                            {{  $report->terminal_left }}
                        </td>
                        <td>
                            {{ $report->speedometer_readings_1 }}
                        </td>
                        <td>
                            {{ $report->client_arrived }}
                        </td>
                        <td>
                            {{ $report->time_unloading }}
                        </td>
                        <td>
                            {{ $report->client_left }}
                        </td>
                        <td>
                            {{ $report->terminal_arrived }}
                        </td>
                        <td>
                            {{ $report->speedometer_readings_2 }}
                        </td>
                        <td>
                            {{ $report->distance }}
                        </td>
                        <td>
                            {{ $report->fuel }}
                        </td>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
