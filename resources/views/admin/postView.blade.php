@extends('../layouts.app')
@section('title','Home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-12 pb-3 text-right">
                <a href="/admin/category/categoryEdit" class="btn btn-success text-white"><i class="fas fa-plus-circle"></i>New Category</a>
                <a href="/admin/post/new" class="btn btn-info text-white"><i class="fas fa-plus-circle"></i>New Post</a>
            </div>
            <div class="content">
                <div class="m-3">
                     <div class="links">
                        @foreach($categorys as $category)
                        <a href="/admin/{{$category->id}}/show">{{$category->catName}}</a>
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