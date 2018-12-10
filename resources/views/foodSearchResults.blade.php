@extends('layouts.app')

@section('content')
    {{--page specific css--}}
    <link href="{{ asset('/css/foodSearchResults.css') }}" rel="stylesheet">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Search Foods</div>
                <div class="panel-body">
                    {!!Form::open(['action' => 'QueryController@search','method' => 'GET'])!!}
                    {!! Form::text('search', NULL, ['required', 'class'=>'form-control', 'placeholder'=>'Search for food...']) !!}
                    {{Form::bsSubmit('Search')}}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="panel-heading">Search Results
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Foods
                    <span class="pull-right"></span>
                </div>
                <div class="panel-body">
                    <h3>Foods Found</h3>
                    @if(!empty($foods))
                        {{ $foods->appends(Request::only('search'))->links() }}
                        <table class="table table-striped">
                            <tr>
                                <th>Food Name</th>
                                <th>Calorie Count</th>
                                <th>Created On</th>
                                <th style="color:#216a94;">*Serving are 100g/3.5oz</th>
                                <th></th>
                                @if(auth()->user()->isAdmin() != TRUE)
                                    <th></th>
                                    <th></th>
                                @endif
                            </tr>
                            @foreach($foods as $food)
                                <tr>
                                    <td><a href="/foods/{{$food->id}}/edit">{{$food->name}}</a></td>
                                    <td>{{$food->calorie_count}}</td>
                                    <td>{{ date('F d, Y', strtotime($food->created_at))}}</td>
                                    <td>
                                        @if(auth()->user()->isAdmin() == TRUE)
                                            <a class="pull-right btn btn-default" href="/foods/{{$food->id}}/edit">Edit</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(auth()->user()->isAdmin() != TRUE)
                                        {!!Form::open(['action' => ['FoodListingController@foodEaten'],'method' => 'POST', 'class' => 'pull-left'])!!}
                                        {{Form::hidden('foodId', $food->id)}}
                                        {{Form::selectRange('serving_size', 1, 10)}}
                                        {{Form::select('meal', ['Breakfast' => 'Breakfast','Lunch' => 'lunch','Dinner' => 'dinner', 'Snacks' => 'snacks']) }}
                                        {{Form::bsSubmit('Add', ['class' => 'btn btn-success'])}}
                                        {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
