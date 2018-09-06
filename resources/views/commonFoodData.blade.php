<table class="table table-striped">
<tr>
    <th>Food Name</th>
    <th>Calorie Count</th>
    <th>Created On</th>
    <th></th>
    <th></th>
</tr>
    @foreach($foods as $food)
        <tr>
            <td>{{$food->name}}</td>
            <td>{{$food->calorie_count}}</td>
            <td>{{ date('F d, Y', strtotime($food->created_at))}}</td>
            <td><a class="pull-right btn btn-default" href="/foods/{{$food->id}}/edit">Edit</a>
            </td>
            <td>
                {!!Form::open(['action' => ['FoodListingController@destroy', $food->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>