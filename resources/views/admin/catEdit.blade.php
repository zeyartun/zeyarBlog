@extends('../layouts.app')
@section('title','Home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="content">
            	@include('admin/editButton');
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Success!</strong> {{session('success')}}
                        </div>
                    @endif
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
                     <div class="container row">
                        @include('/admin/danger')
                        <div class="col-md-12">
                            <div class="card card-body">
                                <form action="{{ url('admin/category/edit/') }}" method="post">
                                    @csrf 
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Category</label>
                                            <select name="category" class="form-control">
                                                <option value="0" selected="" disabled>Plese Select Category</option>    
                                                @foreach($categorys as $category)
                                                    <option value="{{$category->id}}">{{$category->catName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Edit Category Name</label>
                                            <input type="text" name="Edit_Category" class="form-control">
                                        </div>
                                    </div>
                                	<div class="col-md-12">
                                		<button type="submit" class="btn btn-info w-100 text-white">Edit</button>
                                	</div>
                                </form>
                            </div>
                        </div>  
                        <hr class="w-100">
                        <div class="col-md-6">
                            <div class="card card-body">
                                <form action="{{ url('admin/category/{catID}/delete/') }}" method="get">
                                    @csrf 
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Category</label>
                                            <select name="category" class="form-control">
                                                <option value="0" selected="" disabled>Plese Select Category</option>    
                                                @foreach($categorys as $category)
                                                    <option value="{{$category->id}}">{{$category->catName}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                        
                                    </div>
                                	<div class="col-md-12">
                                		<button type="submit" class="btn btn-danger w-100 text-white">Delete</button>
                                	</div>                                    	
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-body">
                                <form action="{{ url('admin/category/Create/') }}" method="post">
                                    @csrf 
                                        <div class="form-group col-md-12">
                                            <label>New Category Name</label>
                                            <input type="text" name="New_Category" class="form-control">
                                        </div>
                                    	<div class="col-md-12">
                                    		<button type="submit" class="btn btn-success w-100 text-white">Create</button>
                                    	</div>
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