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
                        <td>
                            <button type="button" class="btn-success" data-toggle="modal"
                                    data-target="#reportsEditModal{{ $report->id }}">
                                Edit Report
                            </button>
                            <button type="button" class="btn-danger" data-toggle="modal"
                                    data-target="#reportsDeleteModal{{ $report->id }}">
                                Delete Report
                            </button>

                            {!! Form::open(['url' => route('reports.edit', ['id' => $report->id])]) !!}
                            <div class="modal fade" id="reportsEditModal{{ $report->id }}"
                                 tabindex="-1" role="dialog"
                                 aria-labelledby="reportsEditModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"
                                                id="vehiclesModalLabel">Reports edit form</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div style="font-size: 18px">
                                                {!! Form::select('vehicle', $vehicles, $report->getVehicle->first()['title']) !!}
                                            </div>
                                            <label>Date</label>
                                            <input name="date" type="date" class="form-control" value="{{ $report->date }}">
                                            <label>Route</label>
                                            <input name="route" type="text" class="form-control" value="{{ $report->route }}">
                                            <label>Left terminal at</label>
                                            <input name="left_terminal_at" class="form-control time" type="text" value="{{  $report->terminal_left }}"/>
                                            <label>Speedometer readings</label>
                                            <input name="speedometer_readings_1" type="number" min="0" class="form-control" value="{{ $report->speedometer_readings_1 }}">
                                            <label>Arrived to client at</label>
                                            <input name="arrived_to_client_at" class="form-control time" type="text" value="{{ $report->client_arrived }}"/>
                                            <label>Unloading time</label>
                                            <input name="unloading_time" type="number" min="0" class="form-control" value="{{ $report->time_unloading }}">
                                            <label>Left client at</label>
                                            <input name="left_client_at" class="form-control time" type="text" value="{{ $report->client_left }}"/>
                                            <label>Arrived to terminal at</label>
                                            <input name="arrived_to_terminal_at" class="form-control time" type="text" value="{{ $report->terminal_arrived }}"/>
                                            <label>Speedometer readings</label>
                                            <input name="speedometer_readings_2" type="number" min="0" class="form-control" value="{{ $report->speedometer_readings_2 }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-default"
                                                    data-dismiss="modal">
                                                Close
                                            </button>
                                            <span class="pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}

                            {!! Form::open(['url' => route('reports.delete', ['id' => $report->id])]) !!}
                            <div class="modal fade" id="reportsDeleteModal{{ $report->id }}"
                                 tabindex="-1" role="dialog"
                                 aria-labelledby="reportsDeleteModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"
                                                id="vehiclesModalLabel">Reports delete form</h4>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div>
                                            Are you sure you want to delete this report?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-default"
                                                    data-dismiss="modal">
                                                No
                                            </button>
                                            <span class="pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            Yes
                                        </button>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <button
            type="button"
            class="btn btn-primary btn-lg"
            data-toggle="modal"
            data-target="#reportsCreateModal">
        New Report
    </button>

    {!! Form::open(['url' => route('reports.create')]) !!}
    <div class="modal fade" id="reportsCreateModal"
         tabindex="-1" role="dialog"
         aria-labelledby="reportsModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="vehiclesModalLabel">Reports add form</h4>
                </div>
                <div class="modal-body">
                    <div style="font-size: 18px">
                        {!! Form::select('vehicle', $vehicles, null, ['placeholder' => 'Select a vehicle']) !!}
                    </div>
                    <label>Date</label>
                    <input name="date" type="date" class="form-control">
                    <label>Route</label>
                    <input name="route" type="text" class="form-control">
                    <label>Left terminal at</label>
                    <input name="left_terminal_at" class="form-control time" type="text"/>
                    <label>Speedometer readings</label>
                    <input name="speedometer_readings_1" type="number" min="0" class="form-control">
                    <label>Arrived to client at</label>
                    <input name="arrived_to_client_at" class="form-control time" type="text"/>
                    <label>Unloading time</label>
                    <input name="unloading_time" type="number" min="0" class="form-control">
                    <label>Left client at</label>
                    <input name="left_client_at" class="form-control time" type="text"/>
                    <label>Arrived to terminal at</label>
                    <input name="arrived_to_terminal_at" class="form-control time" type="text"/>
                    <label>Speedometer readings</label>
                    <input name="speedometer_readings_2" type="number" min="0" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">Close
                    </button>
                    <span class="pull-right">
          <button type="submit" class="btn btn-primary">
            Create
          </button>
        </span>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
