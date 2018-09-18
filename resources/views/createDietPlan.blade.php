@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Diet Plan <a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'DietPlanController@store','method' => 'POST'])!!}
                    {{Form::bsText('weight','',['placeholder' => 'Target Weight Loss'])}}
                    {{Form::label('date', 'Target Date')}}
                    {{ Form::date('date', \Carbon\Carbon::now())}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
