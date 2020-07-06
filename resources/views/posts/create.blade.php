@extends('layouts.app')

@section('content')
<div class="container" style="width:50rem;">
    <div>
        <h1>Create post</h1>
            
            {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true]) !!}

 

        <div class="form-group">

            {!! Form::label('title','Title:') !!}

   
            {!!Form::text('title', null, ['class'=>'form-control'])!!}
 
            {!! Form::file('file',['class'=>'form-control']) !!}
     
            {{csrf_field()}}
            {!!Form::submit('Create Post',['class'=>'btn btn-primary btn-sm'])!!}

        </div>
            {!! Form::close() !!}
    </div>



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
</div>
@endif

@endsection