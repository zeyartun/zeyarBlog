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
                        @include('admin/editButton');
                         <div class="links m-3">
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
                    <div class="container">
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="col-md-4 p-2">
                                <div class="card">
                                    <div class="card-header"><h2>{{$post->postTitle}}</h2></div>
                                    @php
                                    $images = $post->images;
                                    $image = '';
                                    if($images != null){
                                        $de_image = decrypt($images);        
                                        $image = $de_image[0];
                                    }
                                    
                                @endphp
                                <div class="card-body"><img class="w-100" src="{{URL::asset('/image/'.$image)}}" alt=""></div>
                                
                                    <div class="card-footer">
                                        <a href="/admin/{{$post->id}}/PostShow" class="btn btn-info"><i class="fas fa-eye text-white"></i></a>
                                        <a href="/admin/{{$post->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        @if($post->deleted_at == FALSE)
                                        <a href="/admin/{{$post->id}}/delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        @else
                                        <a href="/admin/{{$post->id}}/Restore" class="btn btn-dark">Restore</a>
                                         @endif
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
