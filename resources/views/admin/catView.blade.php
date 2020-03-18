@extends('../layouts.app')
@section('title','Home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content">
                <div class="col-md-12 pb-3 text-right">
                    <a href="/admin/post/new" class="btn btn-info text-white"><i class="fas fa-plus-circle"></i>New Post</a>
                    <a href="#" class="btn btn-warning"><i class="fas fa-plus-circle"></i>New User</a>
                    <a href="/admin/category/categoryEdit" class="btn btn-success text-white"><i class="fas fa-plus-circle"></i>New Category</a>
                </div>
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
                            @foreach($categoryView as $postsView)
                            <div class="col-md-4 p-2">
                                <div class="card">
                                    <div class="card-header"><h2>{{$postsView->postTitle}}</h2></div>
                                    <div class="card-body">{{Str::limit($postsView->postContent, 200)}}</div>
                                    <div class="card-footer">
                                        <a href="/admin/{{$postsView->id}}/PostShow" class="btn btn-info"><i class="fas fa-eye text-white"></i></a>
                                        <a href="/admin/{{$postsView->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        @if($postsView->deleted_at == FALSE)
                                        <a href="/admin/{{$postsView->id}}/delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        @else
                                        <a href="/admin/{{$postsView->id}}/Restore" class="btn btn-dark">Restore</a>
                                        @endif
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