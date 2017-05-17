@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('transport/home.title') }}</div>

                    <div class="panel-body">
                        <div>
                            <h3>
                                {{ trans('transport/home.name') }} {{ Auth::user()->name }}
                            </h3>
                        </div>
                        <div>
                            <h3>
                                {{ trans('transport/home.email') }} {{ Auth::user()->email }}
                            </h3>
                        </div>
                        <div>
                            @if(Auth::user()->isAdmin())
                                <h3>
                                    {{ trans('transport/home.role') }} {{ trans('transport/home.roles.admin') }}
                                </h3>
                            @elseif(Auth::user()->isUser())
                                <h3>
                                    {{ trans('transport/home.role') }} {{ trans('transport/home.roles.user') }}
                                </h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
