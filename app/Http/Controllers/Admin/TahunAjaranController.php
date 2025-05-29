<?php

namespace App\Http\Controllers\Admin;

use App\Models\tahunAjaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TahunAjaranController extends Controller
{
    public function index() {
        $tahunAjarans = tahunAjaran::all();
        return view('admin.TahunAjaran.index', [
            'title' => 'Tahun Ajaran',
            'tahunAjarans' => $tahunAjarans
        ]);
    }

    public function create() {
        $semester = ['Ganjil', 'Genap'];
        return view('admin.TahunAjaran.index', [
            'title' => 'Tambah Tahun Ajaran',
            'semester' => $semester
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);

        tahunAjaran::create($request->all());
        return redirect()->route('admin.tahunAjaran.index')->with('success', 'Tahun Ajaran berhasil ditambahkan');
    }

    public function edit($id) {
        $tahunAjaran = tahunAjaran::findOrFail($id);
        $semester = ['Ganjil', 'Genap'];
        return view('admin.TahunAjaran.index', [
            'title' => 'Edit Tahun Ajaran',
            'tahunAjaran' => $tahunAjaran,
            'semester' => $semester
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);

        $tahunAjaran = tahunAjaran::findOrFail($id);
        $tahunAjaran->update($request->all());
        return redirect()->route('admin.tahunAjaran.index')->with('success', 'Tahun Ajaran berhasil diperbarui');
    }

    public function destroy($id) {
        $tahunAjaran = tahunAjaran::findOrFail($id);
        $tahunAjaran->delete();
        return redirect()->route('admin.tahunAjaran.index')->with('success', 'Tahun Ajaran berhasil dihapus');
    }
}
