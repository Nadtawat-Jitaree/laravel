<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Smart Kitchen')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        * {
            font-family: "Kanit", sans-serif !important;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}">Smart Kitchen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                            href="{{route('index')}}">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('packages') ? 'active' : '' }}" aria-current="page"
                            href="{{route('packages.index')}}">แพ็กเกจ</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ติดต่อเรา</a>
                    </li> --}}
                </ul>
            </div>

        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    {{-- <footer class="bg-dark p-3 mt-5 text-white text-center">
        <p>Copyright 2025. Laravel 12</p>
    </footer> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>