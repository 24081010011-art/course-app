<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Course Online</title>

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
            font-size: 21px;
            font-weight: bold;
            color: #2563eb;
            text-decoration: none;
        }

        .nav-link {
            text-decoration: none;
            color: #2563eb;
            font-weight: 600;
        }

        .container {
            min-height: calc(100vh - 64px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .card {
            width: 100%;
            max-width: 430px;
            background: #ffffff;
            border-radius: 14px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
        }

        .title {
            text-align: center;
            margin: 0 0 8px;
            font-size: 28px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
        }

        .success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 11px 13px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .btn {
            width: 100%;
            border: none;
            border-radius: 8px;
            padding: 13px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .register-text {
            text-align: center;
            margin-top: 22px;
            color: #6b7280;
            font-size: 14px;
        }

        .register-text a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ route('login') }}" class="brand">
        Course Online
    </a>

    <a href="{{ route('register') }}" class="nav-link">
        Register
    </a>
</nav>

<div class="container">
    <div class="card">

        <h1 class="title">Login</h1>

        <p class="subtitle">
            Masuk untuk mengelola course
        </p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">
                Login
            </button>
        </form>

        <div class="register-text">
            Belum memiliki akun?
            <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>

    </div>
</div>

</body>
</html>