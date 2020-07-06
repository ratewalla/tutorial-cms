@extends('layouts.app')

@section('content')



<div class="container" style="width:50rem;">
    <h1>Edit post</h1>
{!! Form::model($posts,['method'=>'PATCH', 'action'=>['PostsController@update', $posts->id]]) !!}
<div class="form-group">
    {{csrf_field()}}
{!! Form::label('title','Title:') !!}
{!! Form::text('title',null,['class'=>'form-control']) !!}
{!!Form::submit('Edit',['class'=>'btn btn-primary btn-sm'])!!}

{!!Form::close()!!}


{!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $posts->id]]) !!}
    {{csrf_field()}}
    {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}

</div>
{!!Form::close()!!}


@if (count($errors) > 0)

    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item">
                    {{$error}}
                </li>  
            @endforeach
        </ul>
    </div>
@endif

</div>
@endsection