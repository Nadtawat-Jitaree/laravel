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
    <h1>Login</h1>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}" id="">
        </div>
        <div class="mb-3">
            <label for="password">password</label>
            <input type="password" name="password" class="form-control" rows="5" required id="">
        </div>
        <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
        {{-- <a href="{{route('index')}}" class="btn btn-secondary">ย้อนกลับ</a> --}}
    </form>
@endsection