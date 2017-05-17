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
                <h1 style="color: red;">{{ trans('transport/vehicles.no_vehicles') }}</h1>
            </div>
        @else
            <table>
                <tbody>
                <tr>
                    <td style="font-size: 30px">
                        {{ trans('transport/vehicles.table.vehicle_title') }}
                    </td>
                </tr>

                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>
                            {{ $vehicle['title'] }}
                        </td>
                        <td>
                            <button type="button" class="btn-success" data-toggle="modal"
                                    data-target="#vehiclesEditModal{{$vehicle['id']}}">
                                {{ trans('transport/vehicles.buttons.edit') }}
                            </button>
                            <button type="button" class="btn-danger" data-toggle="modal"
                                    data-target="#vehiclesDeleteModal{{$vehicle['id']}}">
                                {{ trans('transport/vehicles.buttons.delete') }}
                            </button>

                            {!! Form::open(['url' => route('vehicles.edit', ['id' => $vehicle['id']])]) !!}
                            <div class="modal fade" id="vehiclesEditModal{{$vehicle['id']}}"
                                 tabindex="-1" role="dialog"
                                 aria-labelledby="vehiclesEditModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"
                                                id="vehiclesModalLabel">{{ trans('transport/vehicles.forms.edit') }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>{{ trans('transport/vehicles.table.vehicle_title') }}</label>
                                            <input name="title" type="text" class="form-control"
                                                   value="{{$vehicle['title']}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-default"
                                                    data-dismiss="modal">
                                                {{ trans('transport/vehicles.buttons.close') }}
                                            </button>
                                            <span class="pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('transport/vehicles.buttons.save') }}
                                        </button>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}

                            {!! Form::open(['url' => route('vehicles.delete', ['id' => $vehicle['id']])]) !!}
                            <div class="modal fade" id="vehiclesDeleteModal{{$vehicle['id']}}"
                                 tabindex="-1" role="dialog"
                                 aria-labelledby="vehiclesDeleteModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"
                                                id="vehiclesModalLabel">{{ trans('transport/vehicles.forms.delete') }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>{{ trans('transport/vehicles.table.vehicle_title') }}</label>
                                            <input name="title" type="text" class="form-control"
                                                   value="{{$vehicle['title']}}">
                                        </div>
                                        <div>
                                            {{ trans('transport/vehicles.forms.question') }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-default"
                                                    data-dismiss="modal">
                                                {{ trans('transport/vehicles.buttons.no') }}
                                            </button>
                                            <span class="pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('transport/vehicles.buttons.yes') }}
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
            data-target="#vehiclesCreateModal">
        {{ trans('transport/vehicles.buttons.add') }}
    </button>

    {!! Form::open(['url' => route('vehicles.create')]) !!}
    <div class="modal fade" id="vehiclesCreateModal"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="vehiclesModalLabel">{{ trans('transport/vehicles.forms.add') }}</h4>
                </div>
                <div class="modal-body">
                    <label>{{ trans('transport/vehicles.table.vehicle_title') }}</label>
                    <input name="title" type="text" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">
                        {{ trans('transport/vehicles.buttons.close') }}
                    </button>
                    <span class="pull-right">
          <button type="submit" class="btn btn-primary">
            {{ trans('transport/vehicles.buttons.save') }}
          </button>
        </span>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
