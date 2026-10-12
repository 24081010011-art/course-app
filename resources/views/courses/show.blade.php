@extends('layouts.app')

@section('title', 'Detail Course')

@section('content')

<style>
    .detail-card {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    }

    .detail-card h1 {
        font-size: 28px;
        margin-bottom: 8px;
        color: #111827;
    }

    .detail-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 30px;
    }

    .detail-item {
        padding: 18px 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-size: 13px;
        font-weight: bold;
        color: #64748b;
        text-transform: uppercase;
        margin-bottom: 7px;
    }

    .detail-value {
        font-size: 16px;
        color: #1f2937;
        line-height: 1.6;
    }

    .detail-price {
        font-size: 20px;
        font-weight: bold;
        color: #2563eb;
    }

    .detail-actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn {
        display: inline-block;
        padding: 10px 16px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
    }

    .btn-edit {
        background: #fef3c7;
        color: #92400e;
    }

    .btn-back {
        background: #f3f4f6;
        color: #374151;
    }

    .btn:hover {
        opacity: 0.8;
    }
</style>


<div class="detail-card">

    <h1>{{ $course->title }}</h1>

    <p class="detail-subtitle">
        Detail informasi course
    </p>


    {{-- Description --}}
    <div class="detail-item">

        <div class="detail-label">
            Deskripsi
        </div>

        <div class="detail-value">
            {{ $course->description }}
        </div>

    </div>


    {{-- Instructor --}}
    <div class="detail-item">

        <div class="detail-label">
            Instructor
        </div>

        <div class="detail-value">
            {{ $course->instructor }}
        </div>

    </div>


    {{-- Price --}}
    <div class="detail-item">

        <div class="detail-label">
            Harga
        </div>

        <div class="detail-value detail-price">
            Rp {{ number_format($course->price, 0, ',', '.') }}
        </div>

    </div>


    {{-- Created --}}
    <div class="detail-item">

        <div class="detail-label">
            Dibuat
        </div>

        <div class="detail-value">
            {{ $course->created_at->format('d M Y, H:i') }}
        </div>

    </div>


    {{-- Updated --}}
    <div class="detail-item">

        <div class="detail-label">
            Terakhir Diperbarui
        </div>

        <div class="detail-value">
            {{ $course->updated_at->format('d M Y, H:i') }}
        </div>

    </div>


    {{-- Actions --}}
    <div class="detail-actions">

        <a
            href="{{ route('courses.edit', $course) }}"
            class="btn btn-edit"
        >
            Edit Course
        </a>

        <a
            href="{{ route('courses.index') }}"
            class="btn btn-back"
        >
            Kembali
        </a>

    </div>

</div>

@endsection