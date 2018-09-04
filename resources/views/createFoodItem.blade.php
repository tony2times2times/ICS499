@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Food Item <a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'FoodListingController@store','method' => 'POST'])!!}
                    {{Form::bsText('name','',['placeholder' => 'Food Name'])}}
                    {{Form::bsText('calorie_count','',['placeholder' => 'Calorie Count'])}}
                    {{Form::bsTextArea('description','',['placeholder' => 'Food Description'])}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
