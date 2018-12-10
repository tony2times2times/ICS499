@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Edit Account</div>
                <div class="panel-body">
                    {!!Form::open(['action' => ['AccountController@update', $user->id],'method' => 'POST'])!!}
                    {{Form::bsText('name',$user->name,['placeholder' => 'Name','class' => 'form-inline'])}}
                    {{Form::bsText('password','',['placeholder' => 'Password', 'class' => 'form-inline'])}}
                    {{Form::bsText('email',$user->email,['placeholder' => 'Email', 'class' => 'form-inline'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
