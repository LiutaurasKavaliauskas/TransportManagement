@extends('layouts.app')

@section('content')

    <style>
        table, tr, td {
            border: double;
            font-size: 20px;
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
        @if(!$vehicles)
            <div>
                No vehicles!
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

                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>
                            {{ $vehicle }}
                        </td>
                        <td>
                            {{--<button type="button" class="btn-success" data-toggle="modal"--}}
                                    {{--data-target="#vehiclesEditModal{{$vehicle['id']}}">--}}
                                {{--Edit Vehicle--}}
                            {{--</button>--}}
                            {{--<button type="button" class="btn-danger" data-toggle="modal"--}}
                                    {{--data-target="#vehiclesDeleteModal{{$vehicle['id']}}">--}}
                                {{--Delete Vehicle--}}
                            {{--</button>--}}

                            {{--{!! Form::open(['url' => route('vehicles.edit', ['id' => $vehicle['id']])]) !!}--}}
                            {{--<div class="modal fade" id="vehiclesEditModal{{$vehicle['id']}}"--}}
                                 {{--tabindex="-1" role="dialog"--}}
                                 {{--aria-labelledby="vehiclesEditModalLabel">--}}
                                {{--<div class="modal-dialog" role="document">--}}
                                    {{--<div class="modal-content">--}}
                                        {{--<div class="modal-header">--}}
                                            {{--<button type="button" class="close"--}}
                                                    {{--data-dismiss="modal"--}}
                                                    {{--aria-label="Close">--}}
                                                {{--<span aria-hidden="true">&times;</span></button>--}}
                                            {{--<h4 class="modal-title"--}}
                                                {{--id="vehiclesModalLabel">Vehicles edit form</h4>--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-body">--}}
                                            {{--<label>Vehicle title</label>--}}
                                            {{--<input name="title" type="text" class="form-control" value="{{$vehicle['title']}}">--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-footer">--}}
                                            {{--<button type="button"--}}
                                                    {{--class="btn btn-default"--}}
                                                    {{--data-dismiss="modal">--}}
                                                {{--Close--}}
                                            {{--</button>--}}
                                            {{--<span class="pull-right">--}}
                                        {{--<button type="submit" class="btn btn-primary">--}}
                                            {{--Save--}}
                                        {{--</button>--}}
                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--{!! Form::close() !!}--}}

                            {{--{!! Form::open(['url' => route('vehicles.delete', ['id' => $vehicle['id']])]) !!}--}}
                            {{--<div class="modal fade" id="vehiclesDeleteModal{{$vehicle['id']}}"--}}
                                 {{--tabindex="-1" role="dialog"--}}
                                 {{--aria-labelledby="vehiclesDeleteModalLabel">--}}
                                {{--<div class="modal-dialog" role="document">--}}
                                    {{--<div class="modal-content">--}}
                                        {{--<div class="modal-header">--}}
                                            {{--<button type="button" class="close"--}}
                                                    {{--data-dismiss="modal"--}}
                                                    {{--aria-label="Close">--}}
                                                {{--<span aria-hidden="true">&times;</span></button>--}}
                                            {{--<h4 class="modal-title"--}}
                                                {{--id="vehiclesModalLabel">Vehicles delete form</h4>--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-body">--}}
                                            {{--<label>Vehicle title</label>--}}
                                            {{--<input name="title" type="text" class="form-control" value="{{$vehicle['title']}}">--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--Are you sure you want to delete this vehicle?--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-footer">--}}
                                            {{--<button type="button"--}}
                                                    {{--class="btn btn-default"--}}
                                                    {{--data-dismiss="modal">--}}
                                                {{--No--}}
                                            {{--</button>--}}
                                            {{--<span class="pull-right">--}}
                                        {{--<button type="submit" class="btn btn-primary">--}}
                                            {{--Yes--}}
                                        {{--</button>--}}
                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--{!! Form::close() !!}--}}

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
                    {!! Form::select('vehicle', $vehicles, null, ['placeholder' => 'Select a vehicle']) !!}
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
