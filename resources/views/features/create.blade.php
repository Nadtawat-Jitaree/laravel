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
        <h1 class="h5">สร้างฟีเจอร์</h1>
        <form action="{{route('features.store')}}" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col">
                    <label for="feature_name">ชื่อ feature</label>
                    <input type="text" name="feature_name" class="form-control" id="" required>
                </div>
                <div class="col">
                    <label for="feature_description">รายละเอียด</label>
                    <input type="text" name="feature_desc" class="form-control" rows="5" required id="">
                </div>
                <div class="col">
                    <label for="packageId">แพ็กเกจ</label>
                    <select name="packageId" id="" class="form-control">

                        @if($packages->count())
                            @foreach ($packages as $package)
                                <option value="{{$package->id}}">{{$package->package_name}}</option>
                            @endforeach
                        @else
                            <option>ยังไม่มีข้อมูลในระบบ</option>
                        @endif
                    </select>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-4">
                    <label for="feature_code">feature Code</label>
                    <input type="text" name="feature_code" class="form-control" rows="5" required id="">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{route('packages.index')}}" class="btn btn-secondary mx-2">ย้อนกลับ</a>
                <button type="submit" class="btn btn-dark">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
@endsection