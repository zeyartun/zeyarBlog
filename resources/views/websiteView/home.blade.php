@extends('websiteView.app')
@section('title','Home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content">
                    <div class="m-3">
                         <div class="links">
                            <a href="{{ url('/home') }}">Home</a>
                            <a href="{{ url('/about') }}">About</a>
                            <a href="{{ url('/html') }}">Html</a>
                            <a href="{{ url('/css') }}">Css</a>
                            <a href="{{ url('/js') }}">Javascript</a>
                            <a href="{{ url('/jquery') }}">JQuery</a>
                            <a href="{{ url('/php') }}">PHP</a>
                            <a href="{{ url('/sql') }}">SQL</a>
                            <a href="{{ url('/c#') }}">C#</a>
                            <a href="{{ url('/ps') }}">Photoshop</a>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <div class="card">
                
                <div class="card-header">Home</div>

                <div class="card-body">
                
                </div>
                <div class="content">
                    <h1>Welcome To Home Page</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection