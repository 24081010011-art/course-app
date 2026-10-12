<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Course Online</title>

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
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 7%;
        }

        .brand {
            text-decoration: none;
            color: #2563eb;
            font-size: 21px;
            font-weight: bold;
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
            max-width: 500px;
            background: white;
            border-radius: 14px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.07);
        }

        h1 {
            text-align: center;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .btn {
            width: 100%;
            border: none;
            padding: 13px;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .login-text {
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
        }

        .login-text a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ route('login') }}" class="brand">
        Course Online
    </a>

    <a href="{{ route('login') }}" class="nav-link">
        Login
    </a>
</nav>

<div class="container">

    <div class="card">

        <h1>Register</h1>

        <p class="subtitle">
            Buat akun baru untuk mengakses Course Online
        </p>

        <form action="{{ route('register.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama"
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                >

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                >
            </div>

            <button type="submit" class="btn">
                Daftar
            </button>
        </form>

        <div class="login-text">
            Sudah punya akun?
            <a href="{{ route('login') }}">
                Login
            </a>
        </div>

    </div>

</div>

</body>
</html>