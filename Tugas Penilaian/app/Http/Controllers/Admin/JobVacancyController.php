<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobVacancyController extends Controller
{
    public function index()
    {
        $vacancies = JobVacancy::orderBy('created_at', 'desc')->get();
        return view('admin.careers.index', compact('vacancies'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|in:full-time,part-time,contract,internship',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary_range' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $vacancy = JobVacancy::create(array_merge($validated, [
            'posted_by' => Auth::id(),
            'is_active' => $request->has('is_active'),
        ]));

        return redirect()->route('admin.careers.index')->with('success', 'Lowongan kerja berhasil ditambahkan!');
    }

    public function edit(JobVacancy $vacancy)
    {
        return view('admin.careers.edit', compact('vacancy'));
    }

    public function update(Request $request, JobVacancy $vacancy)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|in:full-time,part-time,contract,internship',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary_range' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $vacancy->update(array_merge($validated, [
            'is_active' => $request->has('is_active'),
        ]));

        return redirect()->route('admin.careers.index')->with('success', 'Lowongan kerja berhasil diperbarui!');
    }

    public function destroy(JobVacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Lowongan kerja berhasil dihapus!');
    }
}