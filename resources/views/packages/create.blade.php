@extends('layout.layout')

@section('content')
    <div class="card p-5 rounded-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="h5">สร้างแพ็กเกจ</h1>
        <form action="{{route('packages.store')}}" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col">
                    <label for="package_name">ชื่อ Package</label>
                    <input type="text" name="package_name" class="form-control" id="" required>
                </div>
                <div class="col">
                    <label for="package_description">รายละเอียด</label>
                    <input type="text" name="package_description" class="form-control" rows="5" required id="">
                </div>
                <div class="col">
                    <label for="duration">ประเภทแพ็กเกจ</label>
                    <select name="duration" id="" class="form-control">
                        <option value="M">รายเดือน</option>
                        <option value="Y">รายปี</option>
                    </select>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-4">
                    <label for="price">ราคา</label>
                    <input type="text" name="price" class="form-control" rows="5" required id="">
                </div>
                <div class="col-4">
                    <label for="package_code">Package Code</label>
                    <input type="text" name="package_code" class="form-control" rows="5" required id="">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{route('packages.index')}}" class="btn btn-secondary mx-2">ย้อนกลับ</a>
                <button type="submit" class="btn btn-dark">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
@endsection