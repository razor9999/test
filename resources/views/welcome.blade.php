@extends('layouts.welcome')

@section('content')
    <h3 class="page-title">@lang('quickadmin.influencer.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['influencers.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('quickadmin.influencer.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="text-danger"></p>
                    @if($errors->has('email'))
                        <p class="text-danger ">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.influencer.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="text-danger"></p>
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('phone', trans('quickadmin.influencer.fields.phone'), ['class' => 'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="text-danger"></p>
                    @if($errors->has('phone'))
                        <p class="text-danger">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nick_name', trans('quickadmin.influencer.fields.nick-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nick_name', old('nick_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="text-danger"></p>
                    @if($errors->has('nick_name'))
                        <p class="text-danger">
                            {{ $errors->first('nick_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('interactive', "Lượng tương tác", ['class' => 'control-label']) !!}
                    {!! Form::text('interactive', old('interactive'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="text-danger"></p>
                    @if($errors->has('interactive'))
                        <p class="text-danger">
                            {{ $errors->first('interactive') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('interesting',"Lĩnh vực chuyên môn", ['class' => 'control-label']) !!}
                    {!! Form::select('interesting', $interesting->pluck('name'), $interesting->pluck('id'), ['class' => 'form-control']) !!}
                    <p class="text-danger"></p>
                    @if($errors->has('interesting'))
                        <p class="text-danger">
                            {{ $errors->first('interesting') }}
                        </p>
                    @endif
                </div>
            </div>




        </div>
    </div>

    {!! Form::submit("Đăng ký", ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

