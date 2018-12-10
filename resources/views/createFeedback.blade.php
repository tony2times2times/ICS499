@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">What can we help you with?</div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'FeedbackController@store','method' => 'POST'])!!}
                    {{Form::textarea('message','',['placeholder' => 'User Feedback','class'=>'form-control', 'rows' => 10, 'cols' => 40])}}
                    <div class="pull-right btn-space">{{Form::bsSubmit('submit')}}</div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
