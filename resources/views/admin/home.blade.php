@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content">
                <!-- <div class="flex-center position-ref full-height"> -->
                    <div class="">
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
                <!-- </div> -->
            </div>
            <div class="card">
                
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 
                </div>
                <div class="content">
                    <h1>Welcome To Home Page</h1>

                    <div class="container">
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="col-md-4 p-2">
                                <div class="card">
                                    <div class="card-header"><h2>{{$post->postTitle}}</h2></div>
                                    <div class="card-body">{{$post->postContent}}</div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-info"><i class="fas fa-eye text-white"></i></a>
                                        <a href="#" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
