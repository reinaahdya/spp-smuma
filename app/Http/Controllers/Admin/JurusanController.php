<?php

namespace App\Http\Controllers\Admin;

use App\Models\jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JurusanController extends Controller
{
    public function index() {
        $jurusans = jurusan::all();
        return view('admin.jurusan.index', [
            'title' => 'Jurusan',
            'jurusans' => $jurusans
        ]);
    }

    public function create() {
        return view('admin.jurusan.index', [
            'title' => 'Tambah Jurusan'
        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'jurusan' => 'required',
        ]);

        jurusan::create($request->all());
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
    }
    public function edit($id) {
        $jurusan = jurusan::findOrFail($id);
        return view('admin.jurusan.edit', [
            'title' => 'Edit Jurusan',
            'jurusan' => $jurusan
        ]);
    }
    public function update(Request $request, $id) {
        $request->validate([
            'jurusan' => 'required',
        ]);

        $jurusan = jurusan::findOrFail($id);
        $jurusan->update($request->all());
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui');
    }
    public function destroy($id) {
        $jurusan = jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus');
    }
}
