@extends('layouts.app')

@section('title', 'Dashboard Course')

@section('content')

<style>
    .page-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .admin-card {
        background: white;
        border-radius: 12px;
        padding: 28px 30px;
        margin-bottom: 25px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .admin-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: #2563eb;
    }

    .admin-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px;
    }

    .admin-text h1 {
        margin: 0 0 7px;
        font-size: 25px;
        color: #1f2937;
    }

    .admin-text p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    .admin-right {
        display: flex;
        align-items: center;
        gap: 15px;
        flex-shrink: 0;
    }

    .total-box {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 9px;
        padding: 10px 18px;
        min-width: 105px;
        text-align: center;
    }

    .total-label {
        display: block;
        color: #6b7280;
        font-size: 12px;
        margin-bottom: 2px;
    }

    .total-number {
        display: block;
        color: #2563eb;
        font-size: 22px;
        font-weight: 700;
    }

    .add-btn {
        display: inline-block;
        background: #2563eb;
        color: white;
        padding: 11px 16px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
    }

    .add-btn:hover {
        background: #1d4ed8;
    }

    .course-card {
        background: white;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .course-header {
        padding: 22px 25px;
        border-bottom: 1px solid #e5e7eb;
    }

    .course-header h2 {
        margin: 0;
        font-size: 20px;
        color: #1f2937;
    }

    .course-header p {
        margin: 5px 0 0;
        color: #6b7280;
        font-size: 13px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .course-table {
        width: 100%;
        border-collapse: collapse;
    }

    .course-table th,
    .course-table td {
        padding: 14px 15px;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
        vertical-align: middle;
    }

    .course-table th {
        background: #f8fafc;
        color: #374151;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
    }

    .course-table td {
        color: #4b5563;
        font-size: 14px;
    }

    .course-table tbody tr:last-child td {
        border-bottom: none;
    }

    .course-table tbody tr:hover {
        background: #fafafa;
    }

    .course-name {
        color: #374151;
        font-weight: 600;
    }

    .description {
        max-width: 330px;
        line-height: 1.5;
    }

    .price {
        white-space: nowrap;
        font-weight: 500;
    }

    .action-buttons {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .action-btn {
        display: inline-block;
        padding: 7px 10px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        border: none;
        cursor: pointer;
    }

    .btn-detail {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-detail:hover {
        background: #dbeafe;
    }

    .btn-edit {
        background: #fef3c7;
        color: #92400e;
    }

    .btn-edit:hover {
        background: #fde68a;
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fecaca;
    }

    .delete-form {
        margin: 0;
    }

    .empty-data {
        padding: 45px 20px;
        text-align: center;
        color: #6b7280;
        font-size: 14px;
    }

    @media (max-width: 800px) {
        .admin-content {
            align-items: flex-start;
            flex-direction: column;
        }

        .admin-right {
            width: 100%;
        }

        .total-box {
            flex: 1;
        }

        .add-btn {
            flex: 1;
            text-align: center;
        }

        .description {
            max-width: 250px;
        }
    }

    @media (max-width: 600px) {
        .admin-card {
            padding: 25px 20px;
        }

        .admin-right {
            flex-direction: column;
            align-items: stretch;
        }

        .total-box,
        .add-btn {
            width: 100%;
            box-sizing: border-box;
        }

        .course-header {
            padding: 20px;
        }

        .course-table {
            min-width: 900px;
        }
    }
</style>

<div class="page-container">

    {{-- Header Dashboard --}}
    <div class="admin-card">

        <div class="admin-content">

            <div class="admin-text">

                @if (Auth::user()->role === 'admin')

                    <h1>Dashboard Admin</h1>

                    <p>
                        Selamat datang, {{ Auth::user()->name }}.
                        Kelola data course melalui halaman ini.
                    </p>

                @else

                    <h1>Course Online</h1>

                    <p>
                        Selamat datang, {{ Auth::user()->name }}.
                        Lihat course yang tersedia dalam sistem.
                    </p>

                @endif

            </div>

            <div class="admin-right">

                <div class="total-box">

                    <span class="total-label">
                        Total Course
                    </span>

                    <span class="total-number">
                        {{ $courses->count() }}
                    </span>

                </div>

                {{-- Tombol tambah hanya untuk Admin --}}
                @if (Auth::user()->role === 'admin')

                    <a
                        href="{{ route('courses.create') }}"
                        class="add-btn"
                    >
                        + Tambah Course
                    </a>

                @endif

            </div>

        </div>

    </div>


    {{-- Daftar Course --}}
    <div class="course-card">

        <div class="course-header">

            <h2>Daftar Course</h2>

            <p>
                Daftar course yang tersedia dalam sistem.
            </p>

        </div>


        @if ($courses->count() > 0)

            <div class="table-wrapper">

                <table class="course-table">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Course</th>
                            <th>Deskripsi</th>
                            <th>Instructor</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($courses as $course)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                <td>
                                    <span class="course-name">
                                        {{ $course->title }}
                                    </span>
                                </td>


                                <td>

                                    <div class="description">
                                        {{ Str::limit($course->description, 80) }}
                                    </div>

                                </td>


                                <td>
                                    {{ $course->instructor }}
                                </td>


                                <td class="price">
                                    Rp {{ number_format($course->price, 0, ',', '.') }}
                                </td>


                                <td>

                                    <div class="action-buttons">

                                        {{-- Detail dapat diakses Admin dan User --}}
                                        <a
                                            href="{{ route('courses.show', $course) }}"
                                            class="action-btn btn-detail"
                                        >
                                            Detail
                                        </a>


                                        {{-- Edit dan Hapus hanya Admin --}}
                                        @if (Auth::user()->role === 'admin')

                                            <a
                                                href="{{ route('courses.edit', $course) }}"
                                                class="action-btn btn-edit"
                                            >
                                                Edit
                                            </a>


                                            <form
                                                action="{{ route('courses.destroy', $course) }}"
                                                method="POST"
                                                class="delete-form"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn btn-delete"
                                                    onclick="return confirm('Yakin ingin menghapus course ini?')"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty-data">
                Belum ada course yang tersedia.
            </div>

        @endif

    </div>

</div>

@endsection