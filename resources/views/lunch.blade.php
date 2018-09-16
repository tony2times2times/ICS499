<h3>Lunch</h3>
@php($foods = $lunchFoodsEaten ?? [])
@if(!empty($foods))
    @include('commonFoodData')
@endif
