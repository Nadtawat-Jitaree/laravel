@extends('layout.layout')

@section('content')
    <h1>ALL POST</h1>
    <a href="{{route('basic.create')}}" class="btn btn-primary">+ Create New Post</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{session('success')}}</div>
    @endif

    @if($posts->count())
        @foreach ($posts as $post)
            <div class="card my-3">
                <div class="card-body">
                    <h3>{{$post->title}}</h3>
                    <p>{{Str::limit($post->content, 100)}}</p>
                    <a href="{{route('basic.show', $post)}}" class="btn btn-secondary">View</a>
                    <a href="{{route('basic.edit', $post)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('delete', $post)}}" method="POST" style="display: inline"
                        onsubmit="return confirm('คุณแน่ใจหรือไม่ที่ต้องการลบ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">ยังไม่มีโพสต์ในระบบ</div>
    @endif
@endsection