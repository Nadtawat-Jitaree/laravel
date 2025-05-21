@extends('layout.layout')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>
    <a href="{{route('index')}}" class="btn btn-secondary">ย้อนกลับ</a>
@endsection