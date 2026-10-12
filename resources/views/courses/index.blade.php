@extends('layouts.app')

@section('title', 'Daftar Course')

@section('content')

<style>
    .page-container {
        max-width: 1100px;
        margin: auto;
    }

    /* Header */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .header h1 {
        font-size: 28px;
        margin-bottom: 6px;
    }

    .header p {
        color: #6b7280;
        font-size: 14px;
    }

    /* Button */
    .btn-add {
        display: inline-block;
        background: #2563eb;
        color: white;
        text-decoration: none;
        padding: 11px 18px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
    }

    .btn-add:hover {
        background: #1d4ed8;
    }

    /* Table Card */
    .table-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: #f8fafc;
    }

    th {
        text-align: left;
        padding: 16px 18px;
        font-size: 13px;
        color: #64748b;
        text-transform: uppercase;
        border-bottom: 1px solid #e5e7eb;
    }

    td {
        padding: 16px 18px;
        border-bottom: 1px solid #f0f0f0;
        font-size: 14px;
    }

    tbody tr:hover {
        background: #f8fafc;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    /* Course title */
    .course-title {
        font-weight: bold;
        color: #111827;
    }

    .description {
        color: #6b7280;
        max-width: 300px;
    }

    /* Instructor */
    .instructor {
        font-weight: 500;
    }

    /* Price */
    .price {
        font-weight: bold;
        color: #2563eb;
        white-space: nowrap;
    }

    /* Action buttons */
    .actions {
        display: flex;
        gap: 7px;
        align-items: center;
    }

    .btn {
        display: inline-block;
        padding: 7px 11px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: bold;
        border: none;
        cursor: pointer;
    }

    .btn-detail {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-edit {
        background: #fef3c7;
        color: #92400e;
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn:hover {
        opacity: 0.8;
    }

    /* Empty */
    .empty {
        text-align: center;
        padding: 50px;
        color: #6b7280;
    }

    /* Responsive */
    @media (max-width: 768px) {

        .header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .table-card {
            overflow-x: auto;
        }

        table {
            min-width: 850px;
        }
    }
</style>


<div class="page-container">

    {{-- Header --}}
    <div class="header">

        <div>
            <h1>Daftar Course</h1>
            <p>Kelola data course yang tersedia.</p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn-add">
            + Tambah Course
        </a>

    </div>


    {{-- Table --}}
    <div class="table-card">

        @if($courses->count() > 0)

            <table>

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

                    @foreach($courses as $index => $course)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td>
                                <div class="course-title">
                                    {{ $course->title }}
                                </div>
                            </td>

                            <td>
                                <div class="description">
                                    {{ $course->description }}
                                </div>
                            </td>

                            <td>
                                <span class="instructor">
                                    {{ $course->instructor }}
                                </span>
                            </td>

                            <td>
                                <span class="price">
                                    Rp {{ number_format($course->price, 0, ',', '.') }}
                                </span>
                            </td>

                            <td>

                                <div class="actions">

                                    {{-- Detail --}}
                                    <a
                                        href="{{ route('courses.show', $course) }}"
                                        class="btn btn-detail"
                                    >
                                        Detail
                                    </a>

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('courses.edit', $course) }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('courses.destroy', $course) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus course ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-delete"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">
                <h3>Belum ada course</h3>
                <p>Silakan tambahkan course baru.</p>
            </div>

        @endif

    </div>

</div>

@endsection