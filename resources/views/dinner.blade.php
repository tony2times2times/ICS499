<h3>Dinner</h3>
@php($foods = $dinnerFoodsEaten ?? [])
@if(!empty($foods))
    @include('commonFoodData')
@endif
