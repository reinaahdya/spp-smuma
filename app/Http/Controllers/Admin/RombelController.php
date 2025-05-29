<?php

namespace App\Http\Controllers\Admin;

use App\Models\rombel;
use App\Models\jurusan;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RombelController extends Controller
{
    public function index() {
        $rombels = rombel::all();
        return view('admin.rombel.index', [
            'rombels' => $rombels,
            'title' => 'Rombel',
        ]);
    }

    public function create() {
        $tingkats = Tingkat::all();
        $jurusans = jurusan::all();
        return view('admin.rombel.index', [
            'title' => 'Tambah Rombel',
            'tingkats' => $tingkats,
            'jurusans' => $jurusans,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'rombel' => 'required|string|max:255',
            'tingkat_id' => 'nullable|exists:tingkats,id',
            'jurusan_id' => 'nullable|exists:jurusans,id',
        ]);

        rombel::create([
            'rombel' => $request->rombel,
            'tingkat_id' => $request->tingkat_id,
            'jurusan_id' => $request->jurusan_id,
        ]);

        return redirect()->route('admin.rombel.index')->with('success', 'Rombel berhasil ditambahkan.');
    }

    public function edit($id) {
        $rombel = rombel::findOrFail($id);
        $tingkats = Tingkat::all();
        $jurusans = jurusan::all();
        return view('admin.rombel.edit', [
            'rombel' => $rombel,
            'title' => 'Edit Rombel',
            'tingkats' => $tingkats,
            'jurusans' => $jurusans,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'rombel' => 'required|string|max:255',
            'tingkat_id' => 'nullable|exists:tingkats,id',
            'jurusan_id' => 'nullable|exists:jurusans,id',
        ]);

        $rombel = rombel::findOrFail($id);

        $rombel->update($request->all());

        return redirect()->route('admin.rombel.index')->with('success', 'Rombel berhasil diperbarui.');
    }

    public function destroy($id) {
        $rombel = rombel::findOrFail($id);
        $rombel->delete();
        return redirect()->route('admin.rombel.index')->with('success', 'Rombel berhasil dihapus.');
    }
}
