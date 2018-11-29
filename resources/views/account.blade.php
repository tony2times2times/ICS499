@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Account <a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    {!!Form::open(['action' => ['AccountController@update', $user->id],'method' => 'POST'])!!}
                    {{Form::bsText('name',$user->name,['placeholder' => 'Name'])}}
                    {{Form::bsText('password','',['placeholder' => 'Password'])}}
                    {{Form::bsText('email',$user->email,['placeholder' => 'Email'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
