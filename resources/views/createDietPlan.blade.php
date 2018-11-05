@extends('layouts.app')

@section('content')
    <script type="text/javascript" src="{{ asset('js/createDietPlan.js') }}"></script>
    <link href="{{ asset('css/createDietPlan.css') }}" rel="stylesheet">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Diet Plan <a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'DietPlanController@store','method' => 'POST'])!!}
                    {{Form::label('goal', 'What Is Your Goal')}}
                    {{Form::select('goal', ['Lose' => 'Lose Weight','Gain' => 'Gain Weight','Maintain' => 'Maintain Weight']) }}
                    {{Form::label('weight', 'Target Weight Loss or Gain')}}
                    {{Form::number('weight','',['placeholder' => 'Target Weight'])}}
                    {{Form::label('date', 'Target Date')}}
                    {{ Form::date('date', \Carbon\Carbon::now())}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
