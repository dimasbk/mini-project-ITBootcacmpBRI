<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::paginate(10);
        return view("materi", compact("materi"));
    }

    public function create()
    {
        return view("createMateri");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'materi' => 'required|string|unique:materi,materi',
        ]);

        Materi::create($validatedData);

        return redirect()->route('materi')->with('success', 'Materi created successfully!');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);

        return view('editMateri', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'materi' => 'required|string|unique:materi,materi,' . $id,
        ]);

        $materi = Materi::findOrFail($id);
        $materi->update($validatedData);

        return redirect()->route('materi')->with('success', 'Materi updated successfully!');
    }

    public function delete(Request $request)
    {
        $materi = Materi::findOrFail($request->id);

        if ($materi->delete()) {
            return response('success', 200);
        }
        return response('failed', 400);
    }
}
