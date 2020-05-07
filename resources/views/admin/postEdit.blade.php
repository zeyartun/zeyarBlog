@extends('../layouts.app')
@section('title','Home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content">
            	@include('admin/editButton');
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
                        @include('/admin/danger');
                         <div class="col-md-12">
                            <div class="card card-body">
                                <form action="{{ url('admin/post/'.$posts->id.'/edit/') }}" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Category</label>
                                            <select name="category" class="form-control">
                                                <option value="0" selected="" disabled="">Plese Select Category</option>    
                                                @foreach($categorys as $category)
                                                    <option value="{{$category->id}}" 
                                                        @if($posts->cat_ID == $category->id)
                                                            selected="selected" 
                                                        @endif
                                                        >{{$category->catName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Post Title</label>
                                            <input type="text" name="title" class="form-control" value="{{$posts->postTitle}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Images</label>
                                            <input type="file" multiple name="images[]">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Post Content</label>
                                        <textarea name="content" rows="10" class="form-control">{{$posts->postContent}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection