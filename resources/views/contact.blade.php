@extends('layouts.app')

@section('content')

<h1>This is the contact page</h1>
<ul>
@if (count($people))
    @foreach ($people as $person)
    <li>{{$person}}</li>
    @endforeach
@endif
</ul>

@stop

@section('footer')



@stop