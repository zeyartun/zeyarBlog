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
                        <div class="row">
                            @foreach($categoryView as $postsView)
                            <div class="col-md-4 p-2">
                                <div class="card">
                                    <div class="card-header"><h2>{{$postsView->postTitle}}</h2></div>
                                    @php
                                        $images = $postsView->images;
                                        $image = '';
                                        if($images != null){
                                            $de_image = decrypt($images);        
                                            $image = $de_image[0];
                                        }
                                        
                                    @endphp
                                    <div class="card-body"><img class="w-100" src="{{URL::asset('/image/'.$image)}}" alt=""></div>
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