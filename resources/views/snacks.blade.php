<h3>Snacks</h3>
@php($foods = $snackFoodsEaten ?? [])
@if(!empty($foods))
    @include('commonFoodData')
@endif

