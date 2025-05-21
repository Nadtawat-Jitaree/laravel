@extends('layout.layout')

@section('content')
    <div class="card p-5 rounded-4">
        <form action="{{ route('packages.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-4"><input type="text" name="search" value="{{ request('search') }}"
                        placeholder="ค้นหาแพ็กเกจ..." class="form-control"></div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </div>

        </form>
        <div class="d-flex">
            <div>
                <h1 class="h5">จัดการข้อมูลแพ็กเกจ</h1>
            </div>
            <div class="mx-2"><a href="{{route('packages.create')}}" class="text-primary">เพิ่มข้อมูล</a></div>
            <div class="mx-2"><a href="{{route('features.create')}}" class="text-primary">เพิ่มฟีเจอร์</a></div>
        </div>
        {{-- <a href="{{route('basic.create')}}" class="btn btn-primary">+ Create New Post</a> --}}
        @if(session('success'))
            <div class="alert alert-success mt-3">{{session('success')}}</div>
        @endif
        <table class="table table-bordered rounded-4">
            <tr>
                <td>ชื่อแพ็กเกจ</td>
                <td>ราคาแพ็กเกจ</td>
                <td>สถานะ</td>
                <td></td>
            </tr>
            @if($packages->count())
                @foreach ($packages as $package)
                    <tr>
                        <td>{{$package->package_name}}</td>
                        <td>{{$package->price}}</td>
                        <td>{{$package->status}}</td>
                        <td class="text-center" width='100'><a href="{{route('packages.show', $package)}}"><i
                                    class="bi bi-columns"></i></a><a class="mx-2" href="{{route('packages.edit', $package)}}"><i
                                    class="bi bi-gear"></i></a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">
                        <div class="alert alert-info">ไม่พบข้อมูลในระบบ</div>
                    </td>
                </tr>
            @endif
        </table>
    </div>

@endsection