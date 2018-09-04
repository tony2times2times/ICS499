@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Latest Foods Added By Users <a href="/dashboard" class="pull-right btn btn-default btn-xs">Dashboard</a></div>
                <div class="panel-body">
                    @if(count($foods))
                        <ul class="list-group">
                            @foreach($foods as $food)
                                <li class="list-group-item"><a href="/foods/{{$food->id}}">{{$food->name}}, Calorie Count {{$food->calorie_count}}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <p>No Foods Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
