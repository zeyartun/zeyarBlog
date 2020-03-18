@extends('../layouts.app')
@section('title','Home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                        @include('/admin/danger');
                         <div class="col-md-12">
                            <div class="card card-body">
                                <form action="{{ url('admin/post/new/') }}" method="post">
                                    @csrf 
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Category</label>
                                            <select name="category" class="form-control">
                                                <option value="0" selected="">Plese Select Category</option>    
                                                @foreach($categorys as $category)
                                                    <option value="{{$category->catName}}">{{$category->catName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Post Title</label>
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Post Content</label>
                                        <textarea name="content" rows="10" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Create</button>
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