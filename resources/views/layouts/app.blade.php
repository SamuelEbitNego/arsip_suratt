<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KominfotikJT</title>
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fc;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: white;
            color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 1040;
        }

        .sidebar.hidden {
            margin-left: -250px;
        }

        .sidebar .logo {
            text-align: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .logo img {
            max-width: 200px;
            height: auto;
        }

        .sidebar .nav-link {
            color: black;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: orangered;
            color: white;
        }

        /* Content Wrapper */
        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .content-wrapper.full {
            margin-left: 0;
        }

        /* Toggler Button */
        .toggler {
            position: fixed;
            top: 5px;
            right: 25px;
            background-color: orangered;
            color: white;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1050;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Tambahkan transisi */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            /* Tambahkan bayangan */
        }

        .toggler:hover {
            background-color: darkred;
            /* Ubah warna hover */
            transform: scale(1.1);
            /* Sedikit perbesar saat dihover */
        }

        /* Toggler hidden on large screens */
        @media (min-width: 992px) {
            .toggler {
                display: none;
            }
        }

        /* Responsive Sidebar */
        @media (max-width: 992px) {
            .sidebar {
                margin-left: -250px;
                width: 200px;
            }

            .content-wrapper {
                margin-left: 0;
            }

            .sidebar.hidden {
                margin-left: 0;
            }

        }

        .nav-item {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Toggler Button -->
    <button class="toggler" id="sidebarToggler">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/kominfotik.jpg') }}" alt="Logo">
            </a>
        </div>
        <center>
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge"></i> Dashboard
                    </a>
                </li>
                @if(auth()->user()->role === 'superadmin')
                <li class="nav-item">
                    <a href="{{ route('superadmin.users.index') }}" class="nav-link {{ request()->routeIs('superadmin.users.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user"></i> Mengelola Pengguna
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('suratmasuk.index') }}" class="nav-link {{ request()->is('suratmasuk*') ? 'active' : '' }}">
                        <i class="fa-solid fa-envelope-open-text"></i></i> Surat Masuk
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('suratkeluar.index') }}" class="nav-link {{ request()->is('suratkeluar*') ? 'active' : '' }}">
                        <i class="fa-solid fa-envelope"></i> Surat Keluar
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
    </div>
    </center>
    <!-- Main Content -->
    <div class="content-wrapper" id="contentWrapper">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/dd1776080c.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        const toggler = document.getElementById('sidebarToggler');
        const sidebar = document.getElementById('sidebar');
        const contentWrapper = document.getElementById('contentWrapper');

        toggler.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            contentWrapper.classList.toggle('full');
        });
    </script>
</body>

</html>