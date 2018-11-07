@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert-danger">{{$message ?? ''}}</div>
            <div class="panel panel-default">
                <div class="panel-heading">Edit Diet Plan <a href='{{ url()->previous()}}' class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    {!!Form::open(['action' => ['DietPlanController@update', $dietPlan->id ?? ''],'method' => 'PUT'])!!}
                    {{Form::label('goal', 'What Is Your Goal')}}
                    {{Form::select('goal', ['Lose' => 'Lose Weight','Gain' => 'Gain Weight','Maintain' => 'Maintain Weight']) }}
                    {{Form::bsText('weight',$dietPlan->weight ?? '',['placeholder' => 'Target Weight Loss'])}}
                    {{Form::label('date', 'Target Date')}}
                    {{ Form::date('date', $dietPlan->target_date ?? '')}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
