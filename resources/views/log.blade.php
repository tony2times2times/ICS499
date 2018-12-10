@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Search By Date</div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'LogController@search','method' => 'GET'])!!}
                    {!! Form::date('search', $date, ['required', 'class'=>'form-control']) !!}
                    <span class="pull-right btn-space">{{Form::bsSubmit('Search')}}</span>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="panel panel-default">
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
