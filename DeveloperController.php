<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DeveloperController extends Controller
{
    public function index()
    {
        // Ambil semua kolom, termasuk nama_developer
        $developers = Developer::orderBy('tahun_berdiri', 'asc')->get();
        return view('dashboard', compact('developers'));
    }


    public function create()
    {
        return view('developer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_developer' => 'required|string|max:100|unique:developers,nama_developer',
            'negara' => 'nullable|string|max:50',
            'tahun_berdiri' => 'nullable|integer|min:1950|max:' . date('Y'),
            'deskripsi' => 'nullable|string',
        ]);

        Developer::create($request->all());

        return redirect()->route('developer.index')->with('success', 'Developer berhasil ditambahkan!');
    }

    public function edit(Developer $developer)
    {
        return view('developer.edit', compact('developer'));
    }

    public function update(Request $request, Developer $developer)
    {
        $request->validate([
            'nama_developer' => 'required|string|max:100|unique:developers,nama_developer,' . $developer->id_developer . ',id_developer',
            'negara' => 'nullable|string|max:50',
            'tahun_berdiri' => 'nullable|integer|min:1950|max:' . date('Y'),
            'deskripsi' => 'nullable|string',
        ]);

        $developer->update($request->all());

        return redirect()->route('developer.index')->with('success', 'Developer berhasil diperbarui!');
    }

    public function destroy(Developer $developer)
    {
        try {
            $developer->delete();
            return redirect()->route('developer.index')->with('success', 'Developer berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('developer.index')->with('error', 'Gagal menghapus! Developer ini mungkin masih digunakan oleh data game.');
        }
    }
}
