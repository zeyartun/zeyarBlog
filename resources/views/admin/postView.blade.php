@extends('../layouts.app')
@section('title','Home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('admin/editButton');
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
                                    @php
                                        $images = $post->images;
                                        $deimage = decrypt($images);
                                    @endphp
                                    @foreach ($deimage as $image)
                                        <img src="{{asset('/public/image/'.$image)}}" alt="">
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