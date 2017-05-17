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
                <h1 style="color: red">{{ trans('transport/rates.no_rates') }}</h1>
            </div>
        @else
            <table>
                <tbody>
                <tr>
                    <td style="font-size: 30px">
                        {{ trans('transport/rates.table.title') }}
                    </td>
                    <td style="font-size: 30px">
                        {{ trans('transport/rates.table.idle') }}
                    </td>
                    <td style="font-size: 30px">
                        {{ trans('transport/rates.table.going') }}
                    </td>
                    <td style="font-size: 30px">
                        {{ trans('transport/rates.table.unloading') }}
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
                                {{ trans('transport/rates.buttons.edit') }}
                            </button>
                            <button type="button" class="btn-danger" data-toggle="modal"
                                    data-target="#ratesDeleteModal{{$rate['id']}}">
                                {{ trans('transport/rates.buttons.delete') }}
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
                                                id="vehiclesModalLabel">{{ trans('transport/rates.forms.edit') }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input name="vehicle" type="hidden" value="{{$rate->vehicle['id']}}">
                                            <label>{{ trans('transport/rates.table.idle') }}</label>
                                            <input name="idle_rate" type="number" min="0" class="form-control"
                                                   value="{{  $rate['idle_rate'] }}">
                                            <label>{{ trans('transport/rates.table.going') }}</label>
                                            <input name="going_rate" type="number" min="0" class="form-control"
                                                   value="{{ $rate['going_rate'] }}">
                                            <label>{{ trans('transport/rates.table.unloading') }}</label>
                                            <input name="unloading_rate" type="number" min="0" class="form-control"
                                                   value="{{ $rate['unloading_rate'] }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-default"
                                                    data-dismiss="modal">
                                                {{ trans('transport/rates.buttons.close') }}
                                            </button>
                                            <span class="pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('transport/rates.buttons.save') }}
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
                                                id="ratesModalLabel">{{ trans('transport/rates.forms.delete') }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>{{ trans('transport/rates.table.idle') }}</label>
                                            <input name="idle_rate" type="number" min="0" class="form-control">
                                            <label>{{ trans('transport/rates.table.going') }}</label>
                                            <input name="going_rate" type="number" min="0" class="form-control">
                                            <label>{{ trans('transport/rates.table.unloading') }}</label>
                                            <input name="unloading_rate" type="number" min="0" class="form-control">
                                        </div>
                                        <div>
                                            {{ trans('transport/rates.forms.question') }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-default"
                                                    data-dismiss="modal">
                                                {{ trans('transport/rates.buttons.no') }}
                                            </button>
                                            <span class="pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('transport/rates.buttons.yes') }}
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
            <h1 style="color: red">{{ trans('transport/rates.create') }}</h1>
        </div>
    @else
        <button
                type="button"
                class="btn btn-primary btn-lg"
                data-toggle="modal"
                data-target="#ratesCreateModal">
            {{ trans('transport/rates.buttons.add') }}
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
                        id="vehiclesModalLabel">{{ trans('transport/rates.forms.add') }}</h4>
                </div>
                <div class="modal-body">
                    <div style="font-size: 18px">
                        {!! Form::select('vehicle', $vehicles, null, ['placeholder' => trans('transport/rates.forms.select')]) !!}
                    </div>
                    <label>{{ trans('transport/rates.table.idle') }}</label>
                    <input name="idle_rate" type="number" min="0" class="form-control">
                    <label>{{ trans('transport/rates.table.going') }}</label>
                    <input name="going_rate" type="number" min="0" class="form-control">
                    <label>{{ trans('transport/rates.table.unloading') }}</label>
                    <input name="unloading_rate" type="number" min="0" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">
                        {{ trans('transport/rates.buttons.close') }}
                    </button>
                    <span class="pull-right">
          <button type="submit" class="btn btn-primary">
            {{ trans('transport/rates.buttons.save') }}
          </button>
        </span>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
