<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // READ - menampilkan semua course
    public function index()
    {
        $courses = Course::latest()->get();

        return view('courses.index', compact('courses'));
    }

    // Menampilkan form tambah course
    public function create()
    {
        return view('courses.create');
    }

    // CREATE - menyimpan course baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'instructor' => 'required|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course berhasil ditambahkan.');
    }

    // READ - menampilkan detail course
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Menampilkan form edit course
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // UPDATE - memperbarui course
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'instructor' => 'required|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course berhasil diperbarui.');
    }

    // DELETE - menghapus course
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course berhasil dihapus.');
    }
}