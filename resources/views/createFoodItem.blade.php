@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Create Food Item</div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'FoodListingController@store','method' => 'POST'])!!}
                    {{Form::bsText('name','',['placeholder' => 'Food Name', 'class' => 'form-inline'])}}
                    {{Form::bsText('calorie_count','',['placeholder' => 'Calorie Count', 'class' => 'form-inline'])}}
                    {{Form::bsTextArea('description','',['placeholder' => 'Food Description'])}}
                    <span class="pull-right ">{{Form::bsSubmit('submit')}}</span>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
