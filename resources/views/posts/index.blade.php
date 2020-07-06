@extends('layouts.app')

@section('content')
<div  class="container" style="width: 50rem;">


<div>
<ul class="list-group">
    @foreach ($posts as $post)
        <li class="list-group-item">
        <a href="{{route('posts.show',$post->id)}}">{{ $post->title }}</a>
        <div class="image-cotainer">
            <img src="{{$post->path}}" alt="" height="100">
        </div>
        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-secondary btn-sm">Edit</a>
        </li>
    @endforeach
</ul><br>
{{$posts->links()}}
<a href="{{route('posts.create')}}" class="btn btn-primary">Add</a>
</div>
</div>


@yield('footer')