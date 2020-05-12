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
                <!-- </div> -->
            </div>
            <div class="card">
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
                                        <a href="/{{$post->id}}/PostShow">Read More</a>
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