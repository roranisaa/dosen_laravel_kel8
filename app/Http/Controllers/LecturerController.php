<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        return view('lecturers.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers',
            'phone' => 'nullable|string|max:15',
        ]);

        Lecturer::create($request->all());
        return redirect()->route('lecturers.index')->with('success', 'Lecturer created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturers.edit', compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers,email,' . $lecturer->id,
            'phone' => 'nullable|string|max:15',
        ]);

        $lecturer->update($request->all());
        return redirect()->route('lecturers.index')->with('success', 'Lecturer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->route('lecturers.index')->with('success', 'Lecturer deleted successfully.');
    }
}
