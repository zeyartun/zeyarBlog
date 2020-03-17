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
                            @foreach($categoryView as $categoryViewAll)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header"><h2>{{$categoryViewAll->postTitle}}</h2></div>
                                    <div class="card-body">{{$categoryViewAll->postContent}}</div>
                                    <div class="card-footer">
                                        <a href="/admin/{{$category->id}}/{{$categoryViewAll->id}}/show">Read More</a>
                                    </div>
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