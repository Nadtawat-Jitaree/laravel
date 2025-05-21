@extends('layout.layout')

@section('content')
    <div class="card p-5 rounded-4">
        <h1 class="h5">ข้อมูลแพ็กเกจ</h1>
        <div class="row gap-2 px-2">
            <div class="col rounded-4 p-3 card">
                <label for="" class="fw-bold">ชื่อแพ็กเกจ</label>
                <div>{{$packages->package_name}}</div>
            </div>
            <div class="col rounded-4 p-3 card">
                <label for="" class="fw-bold">ราคาแพ็กเกจ</label>
                <div>{{$packages->price}} บาท</div>
            </div>
            <div class="col rounded-4 p-3 card">
                <label for="" class="fw-bold">สถานะ</label>
                <div>{{$packages->status}}</div>
            </div>
        </div>
        <table class="table table-bordered rounded-4 mt-5">
            <tr>
                <td>feature_name</td>
                <td>feature_desc</td>
                <td>feature_Code</td>
            </tr>
            @foreach ($features as $f)
                <tr>
                    <td>{{$f->feature_name}}</td>
                    <td>{{$f->feature_desc}}</td>
                    <td>{{$f->feature_Code}}</td>
                </tr>
            @endforeach
        </table>
        <div class="mt-2 d-flex justify-content-end">
            <a href="{{route('packages.index')}}" class="btn btn-secondary">ย้อนกลับ</a>
        </div>
    </div>

@endsection