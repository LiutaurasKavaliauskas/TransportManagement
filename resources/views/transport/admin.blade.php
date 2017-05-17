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
        @if(!$users)
            <div>
                <h1 style="color: red;">{{ trans('transport/admin.no_users') }}</h1>
            </div>
        @else
            <table>
                <tbody>
                <tr>
                    <td style="font-size: 30px">
                        {{ trans('transport/admin.table.name') }}
                    </td>
                    <td style="font-size: 30px">
                        {{ trans('transport/admin.table.email') }}
                    </td>
                    <td style="font-size: 30px">
                        {{ trans('transport/admin.table.month') }}
                    </td>
                </tr>

                @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $user['name'] }}
                        </td>
                        <td>
                            {{ $user['email'] }}
                        </td>
                        <td>
                            {!! Form::open(['url' => route('users.show', ['id' => $user['id']])]) !!}
                            <div class='input-group date' id='datetimepicker10'>
                                <input name="month" type='text' class="form-control"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="btn-success">
                            {{ trans('transport/admin.butons.show') }}
                            </button>
                        </td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
                </tbody>
            </table>
    @endif

@endsection
