@extends('websiteView.app')
@section('title','Home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content">
                <div class="m-3">
                     <div class="links">
                        @foreach($categorys as $category)
                        <a href="/{{$category->id}}/show">{{$category->catName}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
                <div class="content">
                     <div class="container">
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h1>{{$post->postTitle}}</h1></div>
                                    <div class="card-body">{{$post->postContent}}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection