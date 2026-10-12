@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')

<style>
    .form-card {
        max-width: 700px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    }

    .form-card h1 {
        margin-bottom: 8px;
        font-size: 26px;
    }

    .form-card > p {
        color: #6b7280;
        margin-bottom: 25px;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-size: 14px;
        font-weight: bold;
        color: #374151;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        font-size: 14px;
        font-family: Arial, sans-serif;
        outline: none;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-group textarea {
        min-height: 120px;
        resize: vertical;
    }

    .error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 13px;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn-submit,
    .btn-cancel {
        padding: 10px 17px;
        border-radius: 7px;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        border: none;
    }

    .btn-submit {
        background: #2563eb;
        color: white;
    }

    .btn-submit:hover {
        background: #1d4ed8;
    }

    .btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .btn-cancel:hover {
        background: #e5e7eb;
    }
</style>


<div class="form-card">

    <h1>Edit Course</h1>

    <p>
        Perbarui informasi course yang dipilih.
    </p>


    <form
        action="{{ route('courses.update', $course) }}"
        method="POST"
    >

        @csrf
        @method('PUT')


        {{-- Title --}}
        <div class="form-group">

            <label for="title">
                Judul Course
            </label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $course->title) }}"
                placeholder="Masukkan judul course"
            >

            @error('title')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Description --}}
        <div class="form-group">

            <label for="description">
                Deskripsi
            </label>

            <textarea
                id="description"
                name="description"
                placeholder="Masukkan deskripsi course"
            >{{ old('description', $course->description) }}</textarea>

            @error('description')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Instructor --}}
        <div class="form-group">

            <label for="instructor">
                Instructor
            </label>

            <input
                type="text"
                id="instructor"
                name="instructor"
                value="{{ old('instructor', $course->instructor) }}"
                placeholder="Masukkan nama instructor"
            >

            @error('instructor')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Price --}}
        <div class="form-group">

            <label for="price">
                Harga
            </label>

            <input
                type="number"
                id="price"
                name="price"
                value="{{ old('price', $course->price) }}"
                placeholder="Contoh: 150000"
                min="0"
                step="0.01"
            >

            @error('price')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Buttons --}}
        <div class="form-actions">

            <button
                type="submit"
                class="btn-submit"
            >
                Simpan Perubahan
            </button>

            <a
                href="{{ route('courses.index') }}"
                class="btn-cancel"
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection