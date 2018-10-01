@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Food <a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    {!!Form::open(['action' => ['ProfileController@update', $user->id],'method' => 'POST'])!!}
                    {{Form::bsText('name',$user->name,['placeholder' => 'Name'])}}
                    {{Form::bsText('gender',$user->gender,['placeholder' => 'Gender'])}}
                    {{Form::bsText('height',$user->height,['placeholder' => 'Height'])}}
                    {{Form::bsText('weight',$user->weight,['placeholder' => 'Weight'])}}
                    {{Form::bsText('email',$user->email,['placeholder' => 'Email'])}}
                    {{Form::bsText('calories',$user->calorie_per_day,['placeholder' => 'Calorie Intake Per Day'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
