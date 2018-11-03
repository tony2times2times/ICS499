@extends('layouts.app')

@section('content')
    <h2>This is the Admin page</h2>
    <table class="table table-striped">
        <tr>
            <th>User Name</th>
            <th class="text-center">Role</th>
            <th>Created On</th>
            <th></th>
            <th>Actions</th>
        </tr>

        @foreach($user as $usr)
            <tr>
                <td>{{$usr->name}}</td>
                <td>
                    @if(!empty($usr->role))
                        {{$usr->role}}
                    @else
                        <a class="pull-right btn btn-default" href="/createAdmin/{{$usr->id}}">Make Admin</a>
                    @endif
                </td>
                <td>{{ date('F d, Y', strtotime($usr->created_at))}}</td>
                <td><a class="pull-right btn btn-default" href="/foods/{{$usr->id}}/edit">Edit</a></td>
                <td>
                    {!!Form::open(['action' => ['FoodListingController@destroy', $usr->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
