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
        @if(!$reports)
            <div>
                <h1 style="color: red">No reports created yet!</h1>
            </div>
        @else
            <table>
                <tbody>
                <tr>
                    <td>
                        Vehicle title
                    </td>
                    <td>
                        Date
                    </td>
                    <td>
                        Route
                    </td>
                    <td>
                        Left terminal at
                    </td>
                    <td>
                        Speedometer readings
                    </td>
                    <td>
                        Arrived to client at
                    </td>
                    <td>
                        Unloading time
                    </td>
                    <td>
                        Left client at
                    </td>
                    <td>
                        Arrived to terminal at
                    </td>
                    <td>
                        Speedometer readings
                    </td>
                    <td>
                        Distance
                    </td>
                    <td>
                        Fuel
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
