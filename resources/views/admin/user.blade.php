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
                                <form action="{{ url('admin/user/Register/') }}" method="post">
                                    @csrf 
			                        <div class="form-group row">
			                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
			                            <div class="col-md-6">
			                                <input id="name" type="text" class="form-control " name="name" value="" required autofocus>
										 </div>
			                        </div>

			                        <div class="form-group row">
			                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
			                            <div class="col-md-6">
			                                <input id="email" type="email" class="form-control " name="email" value="" required >
										</div>
			                        </div>

			                        <div class="form-group row">
			                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
			                            <div class="col-md-6">
			                                <input id="password" type="password" class="form-control " name="password" required>
										</div>
			                        </div>
			                        <div class="form-group row mb-0">
			                            <div class="col-md-6 offset-md-4">
			                                <button type="submit" class="btn btn-primary">
			                                    Register
			                                </button>
			                            </div>
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