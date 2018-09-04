@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$food->name}} <a href="/foods" class="pull-right btn btn-default btn-xs">Go Back</a></div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Name: {{$food->name}}</li>
                        <li class="list-group-item">Calorie Count: {{$food->calorie_count}}</li>
                        <li class="list-group-item">Created On: {{ date('F d, Y', strtotime($food->created_at))}}</li>
                    </ul>
                    <hr>
                    <div class="well">
                        {{$food->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
