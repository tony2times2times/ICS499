@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Food <a href='{{ url()->previous()}}' class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    {!!Form::open(['action' => ['FoodListingController@update', $food->id],'method' => 'POST'])!!}
                    {{Form::bsText('name',$food->name,['placeholder' => 'Food Name'])}}
                    {{Form::bsText('calorie_count',$food->calorie_count,['placeholder' => 'Calorie Count'])}}
                    {{Form::bsTextArea('description',$food->description,['placeholder' => 'Food Description'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
