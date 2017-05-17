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
                        <td>
                            <button type="button" class="btn-success" data-toggle="modal"
                                    data-target="#reportsEditModal{{ $report->id }}">
                                {{ trans('transport/reports.buttons.edit') }}
                            </button>
                            <button type="button" class="btn-danger" data-toggle="modal"
                                    data-target="#reportsDeleteModal{{ $report->id }}">
                                {{ trans('transport/reports.buttons.delete') }}
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
                                                id="vehiclesModalLabel">{{ trans('transport/reports.forms.edit') }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div style="font-size: 18px">
                                                {!! Form::select('vehicle', $vehicles, $report->getVehicle->first()['title']) !!}
                                            </div>
                                            <label>{{ trans('transport/reports.table.date') }}</label>
                                            <input name="date" type="date" class="form-control" value="{{ $report->date }}">
                                            <label>{{ trans('transport/reports.table.route') }}</label>
                                            <input name="route" type="text" class="form-control" value="{{ $report->route }}">
                                            <label>{{ trans('transport/reports.table.left_terminal') }}</label>
                                            <input name="left_terminal_at" class="form-control time" type="text" value="{{  $report->terminal_left }}"/>
                                            <label>{{ trans('transport/reports.table.speed_read') }}</label>
                                            <input name="speedometer_readings_1" type="number" min="0" class="form-control" value="{{ $report->speedometer_readings_1 }}">
                                            <label>{{ trans('transport/reports.table.client_arrived') }}</label>
                                            <input name="arrived_to_client_at" class="form-control time" type="text" value="{{ $report->client_arrived }}"/>
                                            <label>{{ trans('transport/reports.table.unload_time') }}</label>
                                            <input name="unloading_time" type="number" min="0" class="form-control" value="{{ $report->time_unloading }}">
                                            <label>{{ trans('transport/reports.table.client_left') }}</label>
                                            <input name="left_client_at" class="form-control time" type="text" value="{{ $report->client_left }}"/>
                                            <label>{{ trans('transport/reports.table.terminal_arrived') }}</label>
                                            <input name="arrived_to_terminal_at" class="form-control time" type="text" value="{{ $report->terminal_arrived }}"/>
                                            <label>{{ trans('transport/reports.table.speed_read') }}</label>
                                            <input name="speedometer_readings_2" type="number" min="0" class="form-control" value="{{ $report->speedometer_readings_2 }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-default"
                                                    data-dismiss="modal">
                                                {{ trans('transport/reports.buttons.close') }}
                                            </button>
                                            <span class="pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('transport/reports.buttons.save') }}
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
                                                id="vehiclesModalLabel">{{ trans('transport/reports.forms.delete') }}</h4>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div>
                                            {{ trans('transport/reports.forms.question') }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-default"
                                                    data-dismiss="modal">
                                                {{ trans('transport/reports.buttons.no') }}
                                            </button>
                                            <span class="pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('transport/reports.buttons.yes') }}
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
        {{ trans('transport/reports.buttons.new') }}
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
                        id="vehiclesModalLabel">{{ trans('transport/reports.forms.add') }}</h4>
                </div>
                <div class="modal-body">
                    <div style="font-size: 18px">
                        {!! Form::select('vehicle', $vehicles, null, ['placeholder' => 'Select a vehicle']) !!}
                    </div>
                    <label>{{ trans('transport/reports.table.date') }}</label>
                    <input name="date" type="date" class="form-control">
                    <label>{{ trans('transport/reports.table.route') }}</label>
                    <input name="route" type="text" class="form-control">
                    <label>{{ trans('transport/reports.table.left_terminal') }}</label>
                    <input name="left_terminal_at" class="form-control time" type="text"/>
                    <label>{{ trans('transport/reports.table.speed_read') }}</label>
                    <input name="speedometer_readings_1" type="number" min="0" class="form-control">
                    <label>{{ trans('transport/reports.table.client_arrived') }}</label>
                    <input name="arrived_to_client_at" class="form-control time" type="text"/>
                    <label>{{ trans('transport/reports.table.unload_time') }}</label>
                    <input name="unloading_time" type="number" min="0" class="form-control">
                    <label>{{ trans('transport/reports.table.client_left') }}</label>
                    <input name="left_client_at" class="form-control time" type="text"/>
                    <label>{{ trans('transport/reports.table.terminal_arrived') }}</label>
                    <input name="arrived_to_terminal_at" class="form-control time" type="text"/>
                    <label>{{ trans('transport/reports.table.speed_read') }}</label>
                    <input name="speedometer_readings_2" type="number" min="0" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">
                        {{ trans('transport/reports.buttons.close') }}
                    </button>
                    <span class="pull-right">
          <button type="submit" class="btn btn-primary">
              {{ trans('transport/reports.buttons.create') }}
          </button>
        </span>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
