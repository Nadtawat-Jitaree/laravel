@extends('layout.layout')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Edit Post</h1>

    <form action="{{route('update', $post)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="content">Content</label>
            <input type="text" name="content" value="{{$post->content}}" class="form-control" rows="5" required id="">
        </div>
        <button type="submit" class="btn btn-warning">แก้ไข</button>
        <a href="{{route('index')}}" class="btn btn-secondary">ย้อนกลับ</a>
    </form>
@endsection