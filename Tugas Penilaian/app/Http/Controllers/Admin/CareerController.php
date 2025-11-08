<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancies = JobVacancy::orderBy('created_at', 'desc')->get();
        return view('admin.career.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'deadline' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['status'] = $data['status'] ?? 'open';

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();

            $uploadPath = public_path('images/career');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $photo->move($uploadPath, $photoName);
            $data['photo'] = 'images/career/' . $photoName;
        }

        JobVacancy::create($data);

        return redirect()->route('admin.career.index')->with('success', 'Lowongan kerja berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobVacancy $career)
    {
        return view('admin.career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobVacancy $career)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required|string|in:open,closed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            if ($career->photo && file_exists(public_path($career->photo))) {
                unlink(public_path($career->photo));
            }

            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();

            $uploadPath = public_path('images/career');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $photo->move($uploadPath, $photoName);
            $data['photo'] = 'images/career/' . $photoName;
        }

        $career->update($data);

        return redirect()->route('admin.career.index')->with('success', 'Lowongan kerja berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobVacancy $career)
    {
        // Hapus foto jika ada
        if ($career->photo && file_exists(public_path($career->photo))) {
            unlink(public_path($career->photo));
        }

        $career->delete();

        return redirect()->route('admin.career.index')->with('success', 'Lowongan kerja berhasil dihapus');
    }
}
