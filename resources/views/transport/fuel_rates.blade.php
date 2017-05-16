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
        @if(!$rates->toArray())
            <div>
                <h1 style="color: red">No fuel rates!</h1>
            </div>
        @else
            <table>
                <tbody>
                <tr>
                    <td style="font-size: 30px">
                        Vehicle title
                    </td>
                    <td style="font-size: 30px">
                        Idle rate
                    </td>
                    <td style="font-size: 30px">
                        Going rate
                    </td>
                    <td style="font-size: 30px">
                        Unloading rate
                    </td>
                </tr>

                @foreach($rates as $rate)
                    <tr>
                        <td>
                            {{$rate->vehicle['title']}}
                        </td>
                        <td>
                            {{ $rate['idle_rate'] }}
                        </td>
                        <td>
                            {{ $rate['going_rate'] }}
                        </td>
                        <td>
                            {{ $rate['unloading_rate'] }}
                        </td>
                        <td>
                            <button type="button" class="btn-success" data-toggle="modal"
                                    data-target="#ratesEditModal{{$rate['id']}}">
                                Edit Rate
                            </button>
                            <button type="button" class="btn-danger" data-toggle="modal"
                                    data-target="#ratesDeleteModal{{$rate['id']}}">
                                Delete Rate
                            </button>

                            {!! Form::open(['url' => route('fuel.rates.edit', ['id' => $rate['id']])]) !!}
                            <div class="modal fade" id="ratesEditModal{{$rate['id']}}"
                                 tabindex="-1" role="dialog"
                                 aria-labelledby="ratesEditModalLabel">
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
                                            <input name="vehicle" type="hidden" value="{{$rate->vehicle['id']}}">
                                            <label>Idle rate</label>
                                            <input name="idle_rate" type="number" min="0" class="form-control" value="{{  $rate['idle_rate'] }}">
                                            <label>Going rate</label>
                                            <input name="going_rate" type="number" min="0" class="form-control" value="{{ $rate['going_rate'] }}">
                                            <label>Unloading rate</label>
                                            <input name="unloading_rate" type="number" min="0" class="form-control" value="{{ $rate['unloading_rate'] }}">
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

                            {!! Form::open(['url' => route('fuel.rates.delete', ['id' => $rate['id']])]) !!}
                            <div class="modal fade" id="ratesDeleteModal{{$rate['id']}}"
                                 tabindex="-1" role="dialog"
                                 aria-labelledby="ratesDeleteModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"
                                                id="ratesModalLabel">Rates Delete Form</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>Idle rate</label>
                                            <input name="idle_rate" type="number" min="0" class="form-control">
                                            <label>Going rate</label>
                                            <input name="going_rate" type="number" min="0" class="form-control">
                                            <label>Unloading rate</label>
                                            <input name="unloading_rate" type="number" min="0" class="form-control">
                                        </div>
                                        <div>
                                            Are you sure you want to delete these rates?
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

    @if(!$vehicles)
        <div>
            <h1 style="color: red">Create a new vehicle first!</h1>
        </div>
    @else
        <button
                type="button"
                class="btn btn-primary btn-lg"
                data-toggle="modal"
                data-target="#ratesCreateModal">
            Add Fuel Rate
        </button>
    @endif

    {!! Form::open(['url' => route('fuel.rates.create')]) !!}
    <div class="modal fade" id="ratesCreateModal"
         tabindex="-1" role="dialog"
         aria-labelledby="ratesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="vehiclesModalLabel">Fuel Rates Add Form</h4>
                </div>
                <div class="modal-body">
                    <div style="font-size: 18px">
                        {!! Form::select('vehicle', $vehicles, null, ['placeholder' => 'Select a vehicle']) !!}
                    </div>
                    <label>Idle rate</label>
                    <input name="idle_rate" type="number" min="0" class="form-control">
                    <label>Going rate</label>
                    <input name="going_rate" type="number" min="0" class="form-control">
                    <label>Unloading rate</label>
                    <input name="unloading_rate" type="number" min="0" class="form-control">
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
