@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Diet Plan
                    <span class="pull-right">
                       @if(!empty($dietPlan[0]))
                        <a class="btn btn-default" href="/dietPlan/{{$dietPlan[0]->id}}/edit">Edit</a>
                       @endif
                        <a href="/dietPlan/create" class="btn btn-success btn-xs">Add Diet Plan</a>
                    </span>
                </div>
                <div class="panel-body">
                    @if(!empty($dietPlan[0]))
                        <h2 class="text-primary">{{$dietPlan[0]->calories_day}} - {{$caloriesEatenToday ?? 0}} </h2>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Search Foods</div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'QueryController@search','method' => 'GET'])!!}
                    {!! Form::text('search', NULL, ['required', 'class'=>'form-control', 'placeholder'=>'Search for food...']) !!}
                    {{Form::bsSubmit('Search')}}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Foods
                    <span class="pull-right"><a href="/foods/create" class="btn btn-success btn-xs">Add Food</a></span>
                </div>
                <div class="panel-body">
                    <h3>Your Foods</h3>
                    @if(!empty($foods))
                        @include('commonFoodData')
                    @endif
                </div>
                <div class="panel-body">
                    @include('breakfast')
                </div>
                <div class="panel-body">
                    @include('lunch')
                </div>
                <div class="panel-body">
                    @include('dinner')
                </div>
                <div class="panel-body">
                    @include('snacks')
                </div>
            </div>
        </div>
    </div>
@endsection
