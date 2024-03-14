<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $classes = Kelas::paginate(10);
        return view("kelas", compact("classes"));
    }

    public function create()
    {
        return view("createKelas");
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'jurusan' => 'required|string',
            'fakultas' => 'required|string',
            'tingkat' => 'required|string',
            'nama_kelas' => 'required|string|unique:kelas,nama_kelas',
        ]);

        Kelas::create($validatedData);

        return redirect()->route('kelas')->with('success', 'Kelas created successfully!');
    }

    public function edit($id)
    {
        $kelas = Kelas::where('id', $id)->first();

        return view('editKelas', compact('kelas'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'jurusan' => 'required|string',
            'fakultas' => 'required|string',
            'tingkat' => 'required|string',
            'nama_kelas' => 'required|string'
        ]);

        $kelas = Kelas::where('id', $request->id)->update($validatedData);

        return redirect()->route('kelas')->with('success', 'Kelas updated successfully!');
    }

    public function delete(Request $request)
    {
        $kelas = Kelas::where('id', $request->id)->first();


        if ($kelas->delete()) {
            return response('success', 200);
        }
        return response('failed', 400);

    }
}
