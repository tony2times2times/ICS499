@extends('layouts.app')

@section('content')
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
                  <p>
                    Weight warrior is a new and exciting software that provides users with unprecedented control of their nutritional needs.
                    Innovative technology that uses your physical information such as weight, height, and age to determine the number of calories you should consume daily.
                    Weight warrior allows you to create custom meal plans. Custom created meals place you in complete control of your diet.


                  </p>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Laravel Documentation</a>
                </div>
            </div>
        </div>
    </body>
@endsection
