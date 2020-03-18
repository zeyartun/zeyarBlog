@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content">
                <!-- <div class="flex-center position-ref full-height"> -->
                    <div class="container">
                        <div class="col-md-12">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  <strong>Success!</strong> {{session('success')}}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 pb-3 text-right">
                            <a href="/admin/category/categoryEdit" class="btn btn-success text-white"><i class="fas fa-plus-circle"></i>New Category</a>
                            <a href="/admin/post/new" class="btn btn-info text-white"><i class="fas fa-plus-circle"></i>New Post</a>
                        </div>
                         <div class="links">
                            @foreach($categorys as $category)
                            <a href="/admin/{{$category->id}}/show">{{$category->catName}}</a>
                            @endforeach
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
                                    <div class="card-body">{{Str::limit($post->postContent, 200)}}</div>
                                    <div class="card-footer">
                                        <a href="/admin/{{$post->id}}/PostShow" class="btn btn-info"><i class="fas fa-eye text-white"></i></a>
                                        <a href="/admin/{{$post->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="/admin/{{$post->id}}/delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
