<h3>BreakFast</h3>
@php($foods = $breakfastFoodsEaten ?? [] )
@if(!empty($foods))
    @include('commonFoodData')
@endif
