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
                            @foreach($posts as $post)
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h1>{{$post->postTitle}}</h1></div>
                                    @php
                                        $images = $post->images;
                                        if ($images != null) {
                                            $deimage = decrypt($images);
                                        }else{
                                            $deimage = [];
                                        }
                                        
                                    @endphp
                                    @foreach ($deimage as $image)
                                        <img src="{{asset('/image/'.$image)}}" alt="" class="pt-2 w-100">
                                    @endforeach
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