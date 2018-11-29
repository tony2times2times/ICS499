@extends('layouts.app') @section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<body>
  <div class="flex-center position-ref full-height">
    <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a class="btn btn-primary" href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif -->
    <div class="content">
      <div class="title m-b-md">
        <div class="text-center">
          <img src="./images/WWLogo.png" alt="Weight Warrior Logo">
        </div>
        <div>
          <div class="paragraphs">
            <div class="row">
              <div class="span4">
                <div class="content-heading">
                  <h3>How does Weight Warrior calculate daily calories?</h3></div>
                  <div>
                <img class="info-image" src="./images/calculate.jpg">
                <br>
                <br>
                <p>
                  The user’s resting metabolic rate(RMR) is first calculated using the <a href="http://healthhappinesslongevity.com/ANewPredictiveEquationForRestingEnergyExpenditureInHealthyIndividuals.pdf">Mifflin-St Jeor equation</a> which is the most accurate estimate of the number of calories a person’s body metabolizes in a day. Once the RMR is determined, calories are either subtracted
                  from the RMR to create a caloric deficit to lose weight or added to create a calorie surplus to gain weight based on the user’s goal. The number of calories that is subtracted or added depends on how many pounds per week the user plans
                  to lose or gain.
                </p>
                <div style="clear:both"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="paragraphs">
            <div class="row">
              <div class="span4">
                <div class="content-heading">
                  <h3>How is calorie consumption related to weight loss or gain?</h3></div>
                <img class="info-image" src="./images/calories.jpg">
                <br>
                <br>
                <p>
                  A <a href="https://pdfs.semanticscholar.org/4cbc/8e61bd345d4a76a766cecc05e44ecaa13d13.pdf">study conducted by Max Wishnofsky</a> for The American Journal of Clinical Nutrition determined that 3,500 is the caloric value of one pound of body weight. Therefore, if you were to
                  consume 3,500 less calories than your RMR over a period of one week, you would lose one pound of body weight a week.
                <div style="clear:both"></div>
              </div>
            </div>
          </div>
          <div class="paragraphs">
            <div class="row">
              <div class="span4">
                <div class="content-heading">
                  <h3>How much physical activity do adults need?</h3></div>
                <img class="info-image" src="./images/exercise.jpg">
                <br>
                <br>
                <p>
                  <a href="https://www.cdc.gov/physicalactivity/basics/adults/index.htm">The Centers for Disease Control and Prevention recommends</a> the following: 2 hours and 30 minutes (150 minutes) of moderate-intensity aerobic activity (i.e., brisk walking) and muscle-strengthening activities on 2 or more days a week that work
                  all major muscle groups (legs, hips, back, abdomen, chest, shoulders, and arms).
            </div>
          </div>
        </div>
      </div>

      <div class="links">
        <!-- <a href="https://laravel.com/docs">Laravel Documentation</a> -->
      </div>
    </div>
  </div>
</body>
@endsection
