@extends('layouts.app')

@section('content')
    {{--page specific css--}}
    <link href="{{ asset('/css/profileController.css') }}" rel="stylesheet">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile <a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    {!!Form::open(['action' => ['ProfileController@update', $user->id],'method' => 'POST'])!!}
                    {{Form::bsText('gender',$user->gender,['placeholder' => 'Gender'])}}
                    {{Form::label('age','Age')}}
                    {{Form::number('age',$user->age,['placeholder' => 'Age'])}}
                    <br>
                    {{Form::label('height','Height Inches')}}
                    {{Form::number('height',$user->height,['placeholder' => 'Height Inches'])}}
                    <br>
                    {{Form::label('weight','Weight Lbs')}}
                    {{Form::number('weight',$user->weight,['placeholder' => 'Weight Lbs'])}}
                    <br>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
