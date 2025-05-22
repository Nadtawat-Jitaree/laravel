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
    <h1>Register</h1>
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" id="">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{old('email')}}" id="">
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" rows="5" required id="">
        </div>
        <div class="mb-3">
            <label for="password_confirmation">Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control" rows="5" required id="">
        </div>
        <button type="submit" class="btn btn-success">สมัครสมาชิก</button>
        {{-- <a href="{{route('index')}}" class="btn btn-secondary">ย้อนกลับ</a> --}}
    </form>
@endsection