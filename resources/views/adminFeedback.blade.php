@extends('layouts.app')

@section('content')
    <h2>User Feedback</h2>
    <table class="table table-striped">
        <tr>
            <th>User Email</th>
            <th>Message</th>
            <th>Created On</th>
            <th>Actions</th>
        </tr>
        @if (!empty($feedback))
            {{ $feedback->appends(Request::only('search'))->links() }}
            @foreach($feedback as $fb)

                <tr>
                    <td>{{$fb->email}}</td>
                    <td>
                        {{$fb->message}}
                    </td>
                    <td>{{ date('F d, Y', strtotime($fb->created_at))}}</td>
                    <td>
                        {!!Form::open(['action' => ['AdminFeedbackController@destroy', $fb->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection
