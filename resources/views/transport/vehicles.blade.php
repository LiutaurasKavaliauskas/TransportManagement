@extends('layouts.app')

@section('content')
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
                </tr>

                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>
                            {{ $vehicle['title'] }}
                        </td>
                        <td>
                            <button type="button" class="btn-successs" data-toggle="modal"
                                    data-target="#vehiclesEditModal{{$vehicle['id']}}">
                                Edit Vehicle
                            </button>
                            <button type="button" class="btn-successs" data-toggle="modal"
                                    data-target="#vehiclesDeleteModal{{$vehicle['id']}}">
                                Delete Vehicle
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
                                                id="vehiclesModalLabel">Vehicles edit form</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>Vehicle title</label>
                                            <input name="title" type="text" class="form-control" value="{{$vehicle['title']}}">
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
                                                id="vehiclesModalLabel">Vehicles delete form</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>Vehicle title</label>
                                            <input name="title" type="text" class="form-control" value="{{$vehicle['title']}}">
                                        </div>
                                        <div>
                                            Are you sure you want to delete this vehicle?
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
            data-target="#vehiclesCreateModal">
        Add Vehicle
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
                        id="vehiclesModalLabel">Vehicles add form</h4>
                </div>
                <div class="modal-body">
                    <label>Vehicle title</label>
                    <input name="title" type="text" class="form-control">
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
