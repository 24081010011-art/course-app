<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Course Online')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        /* NAVBAR */
        .navbar {
            height: 64px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
        }

        .brand {
            color: #2563eb;
            text-decoration: none;
            font-size: 21px;
            font-weight: bold;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-link {
            color: #374151;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }

        .nav-link:hover {
            color: #2563eb;
        }

        .user-name {
            color: #6b7280;
            font-size: 14px;
        }

        .logout-btn {
            border: none;
            background: #fee2e2;
            color: #dc2626;
            padding: 8px 13px;
            border-radius: 7px;
            font-weight: 600;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #fecaca;
        }

        /* CONTENT */
        .container {
            width: 86%;
            max-width: 1200px;
            margin: 35px auto;
        }

        /* ALERT */
        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            .navbar {
                padding: 0 20px;
            }

            .nav-right {
                gap: 10px;
            }

            .user-name {
                display: none;
            }

            .container {
                width: 92%;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

<nav class="navbar">

    <a href="{{ route('courses.index') }}" class="brand">
        Course Online
    </a>

    @auth
        <div class="nav-right">

            <a href="{{ route('dashboard') }}" class="nav-link">
                Dashboard
            </a>

            <a href="{{ route('courses.index') }}" class="nav-link">
                Course
            </a>

            <span class="user-name">
                {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>
    @endauth

</nav>

<main class="container">

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</main>

</body>
</html>