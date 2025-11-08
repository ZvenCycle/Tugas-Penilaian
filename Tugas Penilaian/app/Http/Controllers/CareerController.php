<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancies = JobVacancy::orderBy('created_at', 'desc')
                              ->get();
        
        return view('career', compact('vacancies'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vacancy = JobVacancy::findOrFail($id);
        return view('career_detail', compact('vacancy'));
    }
}