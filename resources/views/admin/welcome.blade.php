<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zeyar Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/cuStyle.css') }}" rel="stylesheet">

        <style>
           
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('home') }}">Website Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   
                </div>
                <div class="links">
                    <a href="{{ url('admin/home') }}">Home</a>
                    <a href="{{ url('admin/about') }}">About</a>
                    <a href="{{ url('admin/html') }}">Html</a>
                    <a href="{{ url('admin/css') }}">Css</a>
                    <a href="{{ url('admin/js') }}">Javascript</a>
                    <a href="{{ url('admin/jquery') }}">JQuery</a>
                    <a href="{{ url('admin/php') }}">PHP</a>
                    <a href="{{ url('admin/sql') }}">SQL</a>
                    <a href="{{ url('admin/c#') }}">C#</a>
                    <a href="{{ url('admin/ps') }}">Photoshop</a>
                </div>
            </div>
        </div>
    </body>
</html>
