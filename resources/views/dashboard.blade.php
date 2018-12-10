@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Progress
                    <span class="pull-right">
                        <a href="/log" class="btn btn-primary btn-xs">Diet Log</a>
                    </span></div>
                <div id="stocks-div"></div>
                @if(isset($lava))
                    <?= $lava->render('LineChart', 'Calories', 'stocks-div') ?>
                @endif
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">My Diet Plan
                    <span class="pull-right">
                       @if(!empty($dietPlan[0]))
                            <a class="btn btn-default btn-xs" href="/dietPlan/{{$dietPlan[0]->id}}/edit">Edit</a>
                        @else
                            <a href="/dietPlan/create" class="btn btn-success btn-xs">Add Diet Plan</a>
                        @endif
                    </span>
                </div>
                <div class="panel-body">
                    @if(!empty($dietPlan[0]))
                        <h2>Total daily calories <b style="color: blue">{{$dietPlan[0]->calories_day}}</b></h2>
                        <h2>You have consumed <b style="color: red">{{$caloriesEatenToday ?? 0}}</b> calories today.</h2>
                        <h2>You can consume <b style="color: green">{{$dietPlan[0]->calories_day - $caloriesEatenToday}}</b> more calories today.</h2>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Search Foods
                    <span class="pull-right"><a href="/foods/create" class="btn btn-success btn-xs">Add Food</a></span>
                </div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'QueryController@search','method' => 'GET'])!!}
                    {!! Form::text('search', NULL, ['required', 'class'=>'form-control', 'placeholder'=>'Search for food...']) !!}
                    <span class="pull-right ">{{Form::bsSubmit('Search', ['class'=>'btn-search'])}}</span>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
