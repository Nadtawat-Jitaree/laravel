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

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h5">สร้างฟีเจอร์</h1>
            <button type="button" class="btn btn-primary btn-sm" id="addFeature">
                + เพิ่มฟีเจอร์
            </button>
        </div>

        <form action="{{route('features.store')}}" method="POST">
            @csrf
            <div id="featuresContainer">
                <div class="feature-item border p-3 mb-3 rounded">
                    <div class="d-flex justify-content-between mb-2">
                        <h6>ฟีเจอร์ที่ 1</h6>
                        <button type="button" class="btn btn-sm btn-danger remove-feature" style="display:none">ลบ</button>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <label>ชื่อ Feature</label>
                            <input type="text" name="features[0][feature_name]" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label>รายละเอียด</label>
                            <input type="text" name="features[0][feature_desc]" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label>แพ็กเกจ</label>
                            <select name="features[0][packageId]" class="form-control" required>
                                <option value="">เลือกแพ็กเกจ</option>
                                @foreach ($packages as $package)
                                    <option value="{{$package->id}}">{{$package->package_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Feature Code</label>
                            <input type="text" name="features[0][feature_code]" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-info">
                จำนวนฟีเจอร์: <span id="featureCount">1</span> รายการ
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{route('packages.index')}}" class="btn btn-secondary me-2">ย้อนกลับ</a>
                <button type="submit" class="btn btn-dark">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>

    <script>
        let featureCount = 1;
        document.getElementById('addFeature').addEventListener('click', function () {
            const container = document.getElementById('featuresContainer');
            const firstItem = container.querySelector('.feature-item');
            const newItem = firstItem.cloneNode(true);
            newItem.querySelector('h6').textContent = `ฟีเจอร์ที่ ${featureCount + 1}`;
            newItem.querySelector('.remove-feature').style.display = 'inline-block';

            const inputs = newItem.querySelectorAll('input, select');
            inputs.forEach(input => {
                const name = input.name.replace(/\[\d+\]/, `[${featureCount}]`);
                input.name = name;
                input.value = '';
            });

            container.appendChild(newItem);
            featureCount++;
            updateUI();
        });
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-feature')) {
                e.target.closest('.feature-item').remove();
                featureCount--;
                updateNumbers();
                updateUI();
            }
        });
        function updateNumbers() {
            document.querySelectorAll('.feature-item').forEach((item, index) => {
                item.querySelector('h6').textContent = `ฟีเจอร์ที่ ${index + 1}`;
                item.querySelectorAll('input, select').forEach(input => {
                    input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
                });
            });
        }

        function updateUI() {
            const items = document.querySelectorAll('.feature-item');
            const removeButtons = document.querySelectorAll('.remove-feature');

            removeButtons.forEach(btn => {
                btn.style.display = items.length > 1 ? 'inline-block' : 'none';
            });

            document.getElementById('featureCount').textContent = items.length;
        }
    </script>
@endsection