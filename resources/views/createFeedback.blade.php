@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Feedback <a href='{{ url()->previous() }}' class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'FeedbackController@store','method' => 'POST'])!!}
                    {{Form::textarea('message','',['placeholder' => 'User Feedback'])}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
